<?php

namespace App;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class TargetJobCategory extends Model
{
    //
    use HasCompositePrimaryKey;

    public $incrementing = false;
    protected $primaryKey = ['target_job_id', 'category_id'];
}
