<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedItem extends Model
{
    protected $table = 'saved_items';

    protected $fillable = ['board_id', 'product_id', 'idea_id', 'topic_id', "offer_id"];

    protected $appends = ['name', 'image', 'link'];

    public function board()
    {
        return $this->belongsTo('App\Boards');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    public function getImageAttribute()
    {
        if ($this->product_id) {
            return $this->product->featured_image;
        } elseif ($this->idea_id) {
            return $this->idea->idea_image;
        } elseif ($this->topic_id) {
            return $this->topic->images[0]->image;
        } elseif ($this->offer_id) {
            return $this->offer->product->featured_image;
        }
    }

    public function getNameAttribute()
    {
        if ($this->product_id) {
            return $this->product->name_en . " by " . $this->product->showroom->name_en;
        } elseif ($this->idea_id) {
            return "Idea";
        } elseif ($this->topic_id) {
            return $this->topic->body . " by " . $this->topic->user_name;
        } elseif ($this->offer_id) {
            return $this->offer->product->name_en . " by " . $this->offer->product->showroom->name_en;
        }
    }

    public function getLinkAttribute()
    {
        if ($this->product_id) {
            return route('user.product.get', $this->product->id);
        } elseif ($this->idea_id) {
            return route('user.get.idea', $this->idea->id);
        } elseif ($this->topic_id) {
            return route('user.get.topic', $this->topic_id);
        } elseif ($this->offer_id) {
            return route('user.product.get', $this->offer->product->id);
        }
    }
}
