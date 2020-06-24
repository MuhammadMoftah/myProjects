<?php

namespace App;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class TargetJobIndustry extends Model
{
    //
    use HasCompositePrimaryKey;

    public $incrementing = false;
    protected $primaryKey = ['target_job_id', 'industry_id'];
}
