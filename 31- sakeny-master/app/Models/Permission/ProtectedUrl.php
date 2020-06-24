<?php namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class ProtectedUrl extends Model {

	protected $fillable = array('title','action','method','element','linked_to','module_id','status','exception');


    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function scopeExceptions($query)
    {
        return $query->where('exception',1);
    }




}
