<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompareAds extends Model
{
    protected $fillable = [
        'title', 'ads_ids', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkInCompareList($ad_id)
    {
        $ads_ids = json_decode($this->ads_ids);

        foreach ($ads_ids as $id) {
            if ($id == $ad_id) {
                return true;
            }
        }

        return false;
    }

    public function addToCompare($ad_id)
    {
        $ads_ids = json_decode($this->ads_ids);

        array_push($ads_ids, $ad_id);

        $this->update([
            'ads_ids' => json_encode($ads_ids),
        ]);
    }
}
