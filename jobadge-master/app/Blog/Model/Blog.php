<?php

namespace App\Blog\Model;

use App\Blog\Model\{
    Comment,
    Like,
    BlogShare
};
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Admin;

class Blog extends Model
{
    //
    use \Spatie\Tags\HasTags;

    protected $fillable = [
        "title",
        "body",
        "image",
        "priority",
        "created_by",
        "active",
        "views"
    ];

    protected $appends = [
        "slug",
    ];

    public function getSlugAttribute(){
        return Str::slug($this->id." ". $this->title , '-');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('is_active', 1);
    }

    public function commentAll()
    {
        return $this->hasMany(Comment::class, "blog_id", "id");
    }

    public function createdBy(){
        return $this->belongsTo(Admin::class, "created_by");
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function shares()
    {
        return $this->hasMany(BlogShare::class, "blog_id");
    }


    public function setImageAttribute($image){
       if($image && !is_string($image)){
           if($this->image){
            
             Storage::disk('s3')->delete('blogs/' . $this->original["image"]);
           }
           $name = $image->store(
                'blogs',
                's3'
            );
           $this->attributes['image'] =   basename($name);
       } 
       if(is_string($image)){
            $this->attributes['image'] =   $image;
       }
        
    }

    public function deleteImage(){
        Storage::disk('s3')->delete('blogs/' . $this->original["image"]);
    }

    

    public function getImageAttribute($value){
        if($value)
            return env('AWS_URL') . 'blogs/' . $value;
        return "";    
     }


     public function getBlogTagesAsString(){
         $name = [];
         foreach($this->tags as $tag){
             $name[] = $tag->name;
         }
         return implode(",", $name);
     }

     
    public function generateShareLink($provider)
    {
        $link = route('web.blog.user.details', $this->slug);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . $this->title;
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $this->title;
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }
    
    
}
