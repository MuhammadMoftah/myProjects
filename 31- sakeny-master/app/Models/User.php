<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\History;
use App\Models\AgentInfo;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Auth\ResetUserPassword;
use App\Http\Controllers\Action\FileController;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Mail;
use Carbon\Carbon;
use App\Models\Package\Subscription;

class User extends Authenticatable
{
    use Notifiable;

    # type == 1 ? user
    # type == 2 ? company
    # type == 3 ? company agent
    # type == 4 ? developer

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'activation', 'type', 'gender',
        'image', 'cover', 'api_token', 'reset_password_code', 'social_id', 'social_type', 'address', 'website',
        'android_token', 'ios_token', 'company_id', 'show_in_front'
    ];

    protected $attributes = [
        'image' => 'img/default-profile-picture.png',
        'type' => 1,
        'activation' => 1,
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;

        $image_name = 'uploads/' . time() . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('s3')->put($image_name, File::get($image), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['image'] = $image_name;
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id', 'user_id');
    }

    public function company_agents()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }

    public function myAgent()
    {
        return $this->belongsTo(AgentInfo::class, 'id', 'user_id');
    }

    public function searchHistory()
    {
        return $this->hasMany(SearchHistory::class, 'user_id', 'id');
    }

    public function compareAds()
    {
        return $this->hasMany(CompareAds::class, 'user_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'owner_id', 'id');
    }

    public function favourite()
    {
        return $this->belongsToMany(Ads::class, 'ad_favourites', 'user_id', 'ad_id')->withTimestamps();
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
        return;
    }

    public function scopeUser($query)
    {
        $query->whereType(1);
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function scopeActiveUser($query)
    {
        return $query->user()->active();
    }

    public function scopeCompanyQ($query)
    {
        $query->whereType(2);
    }

    public function scopeAgent($query)
    {
        $query->whereType(3);
    }

    public function getCompareList()
    {
        $compare_list = CompareAds::where('user_id', $this->id)->first();

        if (!$compare_list) {
            return [];
        }

        $ids = json_decode($compare_list->ads_ids);

        $ads = Ads::active()->BusinessOrder()->Valid()->whereHas('owner', function ($query) {
            $query->where('activation', 1);
        })->whereIn('id', $ids)->get();

        return $ads;
    }

    public function sendMessage($message)
    {
        $email = $this->email;
        $subject = "Sakeny news";

        $headers = "From: info@sakeny.com";

        mail($email, $subject, $message, $headers);
    }

    public function manageHistory($ad_id)
    {
        $history = History::where('user_id', $this->id)->first();

        if ($history) {
            $ads_ids = json_decode($history->ads_ids);

            foreach ($ads_ids as $id) {
                if ($id == $ad_id) {
                    return;
                }
            }

            // remove last ad from the history if there is 5 ads
            if (count($ads_ids) == 5) {
                array_pop($ads_ids);
            }

            array_push($ads_ids, $ad_id);

            $history->update([
                'ads_ids' => json_encode($ads_ids),
            ]);

            return;
        }

        $ads_ids = array();

        array_push($ads_ids, $ad_id);

        History::create([
            'user_id' => $this->id,
            'ads_ids' => json_encode($ads_ids)
        ]);
    }


    public function sendResetMail()
    {
        //        dd('sssss');
        $lang = app()->getLocale();
        $code = $this->reset_password_code;
        $email = $this->email;
        $subject = "Sakeny Forget Password";
        //        $mail_body = 'please click this link to change your password ' . route('user.newpassword.get', ['code' => $this->reset_password_code, 'lang' => app()->getLocale()]);


        //        $headers = "From: info@sakeny.com";

        //        mail($email, $subject, $mail_body, $headers);
        //        Mail::send('emails.request-call', compact('email', 'phone', 'name', 'user_message'), function ($mail) use ($project, $name, $emailTo) {
        Mail::send('emails.reset-password', compact('lang', 'code'), function ($mail) use ($email, $subject) {
            $mail->to($email);
            $mail->subject($subject);
        });
    }


    // public function subscription()
    // {
    //     return $this->hasOne(PackagePayment::class, 'user_id', 'id');
    // }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activesubscription()
    {
        $now = Carbon::now()->toDateTimeString();
        return $this->hasOne(Subscription::class)
            ->active()->approve()
            ->whereDate('start_date', '<=', $now)->whereDate('end_date', '>=', $now);
    }
}
