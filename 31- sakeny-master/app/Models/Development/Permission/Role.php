<?php namespace App\Models\Development\Permission;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
	protected $fillable = array('title');

	public function url()
	{
		return $this->belongsToMany(ProtectedUrl::class,'role_urls','role_id','url_id');
	}


	public function modules()
	{
		return $this->belongsToMany(Module::class,'role_modules','role_id','module_id');
	}

}
