<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
