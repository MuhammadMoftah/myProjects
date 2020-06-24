<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_uses';
    protected $fillable = [ 'name', 'email', 'phone', 'message' ];
}
