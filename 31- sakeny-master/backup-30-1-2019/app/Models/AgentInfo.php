<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentInfo extends Model
{
    protected $fillable = ['phone', 'city', 'user_id','number_of_premium_ads','number_of_regular_ads','number_of_agents','number_of_repost'];

    protected $hidden = ['user_id','number_of_premium_ads','number_of_regular_ads','number_of_agents'];


    public function hasMorePoints($column)
    {
        return $this->$column > 0 ? true : false;
    }

    public function decrementPoints($column, $decrements = 1)
    {
        return $this->decrement($column,$decrements);
    }



}
