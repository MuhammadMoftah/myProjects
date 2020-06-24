<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultantRequest;
use App\Services\site\ConsultantService;
use Illuminate\Support\Facades\DB;

class ConsultantController extends Controller
{
    protected $consultantService;

    public function __construct(ConsultantService $consultantService)
    {
        $this->consultantService = $consultantService;
    }

    public function store(ConsultantRequest $request)
    {
        try {
            if (count(auth('user')->user()->consultants) > 0) {
                return back()->withErrors('You Already Sent A Consultant Message')->withInput();
            }
            DB::beginTransaction();
            $this->consultantService->store();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return back()->with('service', 'consultant')->withMessage('Your message sent successfully. Check our reply on your email in 48 hours. Thank you');
    }
}
