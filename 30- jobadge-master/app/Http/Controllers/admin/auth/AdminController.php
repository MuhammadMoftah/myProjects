<?php

namespace App\Http\Controllers\admin\auth;

use Auth;
use App\Job;
use App\User;
use App\Admin;
use App\Company;
use App\UserJob;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $admin_model;
    protected $request;

    public function __construct(Admin $admin_model, Request $request)
    {
        $this->admin_model = $admin_model;
        $this->request = $request;
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin()
    {
        $this->validate($this->request, $this->admin_model->login_rules());
        if (Auth::guard('admin')->attempt(['email' => $this->request->email, 'password' => $this->request->password])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors('wrong email or password');
    }

    public function getDashboard()
    {
        $companies = Company::count();
        $users = User::count();
        $jobs = Job::count();
        $active_companies = Company::where('verified', 1)->count();
        $active_users = User::where('verified', 1)->count();
        $today_companies = Company::whereDate('created_at', Carbon::now())->count();
        $today_users = User::whereDate('created_at', Carbon::now())->count();
        $today_visitors = Visitor::whereDate('created_at', Carbon::now())->count();
        $apply_job_this_month = UserJob::whereYear("created_at",Carbon::now()->format("Y") )
                                ->whereMonth('created_at', Carbon::now()->format("m") )->count();
        
        $apply_job_this_day = UserJob::whereDate("created_at",Carbon::now() )->count();                        
       
        $months = array();
        $company_counts = array();
        $user_counts = array();
        $job_counts = array();
        $jobseekerApply = array();
        $daysApply           = array();


        for($i=1; $i < Carbon::now()->day; $i++ ){
            array_push($daysApply,"day ". $i);
        }

        array_push($daysApply, "today");

        // data
    


        for ($i = 4; $i >= 0; $i--) {
            // get last five months
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('F');

            if ($i == 0 && $month == "March") {
                $february = Carbon::create()->day(1)->month(2);
                $month = $february->format('F');
                array_push($months, $month);
            } else {
                array_push($months, $month);
            }
        }

        for ($i = 4; $i >= 0; $i--) {
            // get each last month
            $date = Carbon::now()->subMonths($i);

            // companies
            $companies_count = Company::whereMonth("created_at", '=', $date)->count();
            array_push($company_counts, $companies_count);

            // users
            $users_count = User::whereMonth("created_at", '=', $date)->count();
            array_push($user_counts, $users_count);

            // jobs
            $jobs_count = Job::whereMonth("created_at", '=', $date)->count();
            array_push($job_counts, $jobs_count);
        }
        $now         = Carbon::now();
        $day         = $now->day;
        for ($i = $day ; $i > 0; $i--) {
         
            $apply      =   UserJob::whereDate('created_at', $now )->count();
            array_push($jobseekerApply, $apply);
            $now = $now->subDay(1);
        }
       
        return view('admin.pages.dashboard', compact(
            'companies',
            'users',
            'jobs',
            'active_companies',
            'active_users',
            'today_companies',
            'today_users',
            'today_visitors',
            'months',
            'company_counts',
            'user_counts',
            'job_counts',
            'apply_job_this_month',
            'jobseekerApply',
            'daysApply',
            "apply_job_this_day"

        ));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.get');
    }

    public function getProfile()
    {
        return view('admin.pages.profile');
    }

    public function postProfile()
    {
        $this->validate($this->request, $this->admin_model->profile_rules());
        $admin = Auth::guard('admin')->user();
        $admin->update([
            'email' => $this->request->email,
            'name' => $this->request->name,
        ]);

        if (isset($this->request->password) && $this->request->password !== '') {
            $this->validate($this->request, $this->admin_model->password_validate());
            $admin->update([
                'password' => bcrypt($this->request->password)
            ]);
        }

        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->admin_model->validate_image());
            $file = $this->request->image;
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $new_image_path = env('AWS_URL') . 'admins/';
            if ($file->move($new_image_path, $imageName)) {
                if ($admin->image != 'admin.png') {
                    $old_image = env('AWS_URL') . 'admins/' . $admin->image;
                    unlink($old_image);
                }
                $admin->update([
                    'image' => $imageName
                ]);
            }
        }

        return back()->withMessage('profile has been updated!');
    }
}
