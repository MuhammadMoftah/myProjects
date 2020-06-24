<?php namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	protected $table = 'modules';

    protected $fillable = ['title'];

	public function urls()
    {
        return $this->hasMany(ProtectedUrl::class,'module_id','id')->where('linked_to','');
    }

    public function actions()
	{
		return $this->hasMany(ProtectedUrl::class,'module_id','id');
	}



}
