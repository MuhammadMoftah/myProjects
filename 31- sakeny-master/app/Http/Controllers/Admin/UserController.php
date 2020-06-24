<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Rules\PhoneValidity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class
UserController extends CoreController
{
    function __construct(User $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id', 'name', 'email', 'created_at');
        $this->show_columns_select = array('id', 'name', 'email', 'created_at');

        $gender = ['1' => __('lang.male'), '0' => __('lang.female')];
        view()->share(compact('gender'));
        parent::__construct();
    }

    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();

        $rows = $this->model->orderBy($this->orderBy[0], $this->orderBy[1])->whereType(1)->latest()->paginate(15);

        return $this->view('index', array(
            'rows' => $rows,
            'columns' => $this->show_columns_html,
            'breadcrumb' => $this->breadcrumb,
            'select_columns' => $this->show_columns_select
        ));
    }

    public function search()
    {
        $this->pushBreadcrumb(array('Index'));

        $keyword = $this->request->search;

        $rows = $this->model->orderBy($this->orderBy[0], $this->orderBy[1])->where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
        })->whereType(1)->latest()->paginate(15);

        return $this->view('index', array(
            'rows' => $rows,
            'columns' => $this->show_columns_html,
            'breadcrumb' => $this->breadcrumb,
            'select_columns' => $this->show_columns_select
        ));
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users',
            'image' => 'image',
            'phone' => ['required', 'unique:users', 'numeric'],
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Before go inside @update method
     * @return avoid
     */
    public function onUpdate()
    {
        return $this->v([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email,' . request()->route('user'),
            'image' => 'image',
            'phone' => ['required', 'numeric', 'unique:users,phone,' . request()->route('user')],
            // 'password' => 'min:6',
        ]);
    }

    public function export()
    {
        $users = User::select('name', 'email', 'phone')->where('type', 1)->get();

        $exported_users = array();
        foreach ($users as $user) {
            $user_value = [$user->name, $user->email, $user->phone];
            array_push($exported_users, $user_value);
        }

        Excel::create('users', function ($excel) use ($exported_users) {
            $excel->sheet('users', function ($sheet) use ($exported_users) {
                $sheet->rows($exported_users);
            });
        })->export('xls');
    }

    public function import(Request $request, User $user_model)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx|max:4096',
        ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();

        if ($data->count()) {

            foreach ($data as $key => $value) {

                $email = $value->email;
                $name = $value->full_name;
                $phone = $value->phone;
                $user = $user_model->where('email', $email)->first();
                if ($user) {
                    $user->update([
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => '12345678',
                        'activation' => 1
                    ]);
                } else {
                    $user_model->create([
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => '12345678',
                        'type' => 1
                    ]);
                }
            }

            return back()->withMessage('users imported successfully');
        }
    }
}
