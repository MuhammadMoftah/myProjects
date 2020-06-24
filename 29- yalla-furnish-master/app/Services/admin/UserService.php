<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\User;

class UserService
{
    private $user_model;
    private $request;

    public function __construct(User $user_model, Request $request)
    {
        $this->user_model = $user_model;
        $this->request = $request;
    }

    public function getAllUsers()
    {
        $users = $this->user_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $users->where(function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
            })->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }

        $users = $users->latest()->paginate(10);

        return $users;
    }

    public function getSingleUser($id)
    {
        return $this->user_model->findOrFail($id);
    }

    public function becomeContentCreator($id)
    {
        $user = $this->getSingleUser($id);

        $user->content_creator ? $user->update(['content_creator' => 0]) : $user->update(['content_creator' => 1]);
    }

    public function getAllContentCreators()
    {
        $users = $this->user_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $users->where(function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
            })->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }

        $users = $users->creator()->latest()->paginate(10);

        return $users;
    }
}
