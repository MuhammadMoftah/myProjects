<?php

namespace App\Models\Development;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = ['name','url','type','parent_id','sort'];


    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    public function scopeHeads($query)
    {
        return $query->where('parent_id',null);
    }

    // public function scopeHeads($query)
    // {
    //     return $query->where('type','4');
    // }



    //$table->enum('type', ['head','sub','url']);

    public function getTypeAttribute($type)
    {
        switch ($type) {
            case 1:
                return 'head';
                break;
            case 2:
                return 'sub';
                break;
            case 3:
                return 'url';
                break;
            case 4:
                return 'drop menu';
                break;
        }
    }


    public static function getTypes()
    {
        return [1=>'head', 2=>'sub', 3=>'url', 4=>'drop menu'];
    }
}
