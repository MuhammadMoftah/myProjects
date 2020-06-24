<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_id', 'category_id'
    ];

    public function addCategoryToTopic($category_id, $topic_id)
    {
        $this->create([
            'topic_id' => $topic_id,
            'category_id' => $category_id,
        ]);
    }

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
