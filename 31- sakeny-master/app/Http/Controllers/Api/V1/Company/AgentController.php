<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Models\Ads;
use App\Models\Country;
use App\Models\AdsImage;
use App\Models\UnitView;
use App\Models\OfferType;
use App\Models\User;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Http\Controllers\Api\CoreController;

class AgentController extends CoreController
{

    protected function scoper()
    {
        return $this->auth->company_agents();
    }

    public function index()
    {
       return $this->response([
            'data' => $this->auth->myAgent()
        ]);
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        $this->setCreatableAttibutes($this->request->only('name','email','phone','image') +
                                     ['api_token' => md5(uniqid()), 'type'=>3]);



        $this->validator([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'image'=>'image'
        ]);

    }



    public function store()
    {
        if ($this->auth->activation == 2) {
            return $this->buildValidationMessage('title','Your account not approved yet.',423);
        }
        if ($this->auth->company->hasMorePoints('number_of_agents')) {
            $this->auth->company->decrementPoints('number_of_agents');
        }else {
            return $this->buildValidationMessage('name','Your package has been expired, You can not add any more agents ',422);
        }

        $this->ifMethodExistCallIt('onStore');
        $data = $this->request->except('api_token') + ['api_token' => md5(uniqid().$this->request->email) , "company_id" => $this->auth->id , "type" => 3 ];
        $insert = User::create($data);
        $this->ifMethodExistCallIt('isStored', $insert);
        // return $this->returnMessage($insert,1);
          return $this->response([
            'data' => $insert,
            'message' => 'Added successfully'
        ]);
    }



    public function isStored($row)
    {
        /*$data = [
            'content'=>
                'You have been invited to Sakeny
                <br>
                <a href="'.url("api/v1/agent/auth/invitation/{$row->email}/{$row->api_token}").'">Active your account now</a>'
        ];*/
        $domain = "https://sakeny.com/en/activate-agent/{$row->api_token}";
        $data = [
            'content'=>
                'You have been invited to Sakeny
                <br>
                <a href="'.$domain.'">Active your account now</a>'
        ];

        Mail::send('emails.send', $data, function ($message) use($row){
            $message->from(env('MAIL_USERNAME'));
            $message->sender(env('MAIL_USERNAME'));
            $message->to($row->email, $row->name);
            $message->subject('You have been invited to Sakeny');
        });
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
        $this->setUpdatableAttributes($this->request->only('name','email','phone','image') +
                                    ['api_token' => md5(uniqid()), 'type'=>3]);

        $this->validator([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.request()->route('agent'),
            'phone' => 'required|unique:users,phone,'.request()->route('agent'),
            'image'=>'image'
        ]);
    }

}
