<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowroomReviewLike extends Model
{
    protected $fillable = ['showroom_review_id', 'user_id'];
}
