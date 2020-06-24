<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPartner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo', 'company_id'
    ];

    public function getCreateRules($request)
    {
        $logos = count((array)$request->logos);

        if ($logos > 0) {
            foreach ($request->logos as $key => $index) {
                $rules['logos.' . $key] = 'required|image|mimes:jpeg,png,jpg|max:2408';
            }
        }

        return $rules;
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function addPartnerToCompany($logo, $company_id)
    {
        // $logo_name = uniqid() . '.' . $logo->getClientOriginalExtension();
        // $logo_path = env('AWS_URL')  . 'partners/';
        // if (!$logo->move($logo_path, $logo_name)) {
        //     abort(500);
        // }
        $logo_name = $file->store(
            'partners',
            's3'
        );
        $logo_name = basename($logo_name);  

        $this->create([
            'company_id' => $company_id,
            'logo' => $logo_name
        ]);
    }

    public function getPartnerLogo()
    {
        return env('AWS_URL') . 'partners/' . $this->logo;
    }
}
