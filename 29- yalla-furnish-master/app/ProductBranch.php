<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBranch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
