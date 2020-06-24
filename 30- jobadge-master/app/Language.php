<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language', 'rate', 'user_id'
    ];


    public function getCreateRules($user_id)
    {
        return [
            'language' => 'required|max:200|unique:languages,language,NULL,id,user_id,' . $user_id,
            'rate' => 'required|in:1,2,3,4',
        ];
    }

    public function getUpdateRules()
    {
        return [
            'language' => 'required|max:200',
            'rate' => 'required|in:1,2,3,4',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function checkLangForUser($user_id, $language)
    {
        $language = $this->where('language', $language)->where('id', '!=', $this->id)->where('user_id', $user_id)->first();

        return $language;
    }
}
