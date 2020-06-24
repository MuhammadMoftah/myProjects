<?php namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
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

	public function admins()
	{
		return $this->hasMany(Admin::class,'role_id','id');
	}

}
