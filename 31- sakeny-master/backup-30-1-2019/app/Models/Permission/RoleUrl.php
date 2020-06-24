<?php namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class RoleUrl extends Model {

	protected $table = 'role_urls';

	protected $fillable = array('role_id','url_id');


	public function role()
	{
		return $this->hasOne(Role::class,'id','role_id');
	}

	public function url()
	{
		return $this->hasMany(ProtectedUrl::class,'id','url_id');
	}
}
