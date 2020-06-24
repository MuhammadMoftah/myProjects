<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Skill;
use App\User;

class SkillController extends Controller
{

    protected $skill_model;
    protected $request;

    public function __construct(Skill $skill_model, Request $request)
    {
        $this->request = $request;
        $this->skill_model = $skill_model;
    }

    public function postCreate($user_id, User $user_model)
    {
        $this->validate($this->request, $this->skill_model->create_rules());

        $user = $user_model->findOrFail($user_id);
        $skills = explode(',', $this->request->skills);

        foreach ($skills as $skill) {
            if (strlen($skill) > 200) {
                return back()->withErrors('each skill must be less than or equal 200 chars');
            }
        }

        $user->skills()->delete();

        foreach ($skills as $skill) {
            $this->skill_model->create([
                'skill' => $skill,
                'user_id' => $user->id
            ]);
        }
        return back()->withMessage('skills updated successfully!');
    }
}
