<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminsDeactivationHistory extends Model {

    protected $table = 'admins_deactivation_history';
    protected $fillable = [
        'admin_id', 'deactivated_admin_id', 'deactivation_date'
    ];

}
