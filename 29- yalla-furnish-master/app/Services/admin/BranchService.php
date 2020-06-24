<?php

namespace App\Services\admin;

use App\Branch;
use App\BranchInfo;
use Illuminate\Pagination\LengthAwarePaginator;

class BranchService
{

    /**
     * @var Branch
     */
    private $model;

    /**
     * BranchService constructor.
     * @param Branch $model
     */
    public function __construct(Branch $model)
    {
        $this->model = $model;
    }

    public function getBranch(int $id)
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    public function storeNewBranch($showroom_id)
    {
        $branch = $this->model->create([
            'address_en' => request('address_en'),
            'address_ar' => request('address_ar'),
            'mob1' => request('mob1'),
            'mob2' => request('mob2'),
            'lat' => request('lat'),
            'lang' => request('lang'),
            'showroom_id' => $showroom_id,
            'city_id' => request('branch_city'),
            'district_id' => request('branch_district'),
        ]);

        if (request('sunday')) {
            BranchInfo::create([
                'day' => 'sunday',
                'from' => request('working_from_sunday'),
                'to' => request('working_to_sunday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('monday')) {
            BranchInfo::create([
                'day' => 'monday',
                'from' => request('working_from_monday'),
                'to' => request('working_to_monday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('tuesday')) {
            BranchInfo::create([
                'day' => 'tuesday',
                'from' => request('working_from_tuesday'),
                'to' => request('working_to_tuesday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('wednesday')) {
            BranchInfo::create([
                'day' => 'wednesday',
                'from' => request('working_from_wednesday'),
                'to' => request('working_to_wednesday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('thursday')) {
            BranchInfo::create([
                'day' => 'thursday',
                'from' => request('working_from_thursday'),
                'to' => request('working_to_thursday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('friday')) {
            BranchInfo::create([
                'day' => 'friday',
                'from' => request('working_from_friday'),
                'to' => request('working_to_friday'),
                'branch_id' => $branch->id
            ]);
        }

        if (request('saturday')) {
            BranchInfo::create([
                'day' => 'saturday',
                'from' => request('working_from_saturday'),
                'to' => request('working_to_saturday'),
                'branch_id' => $branch->id
            ]);
        }
    }
    public function update($id)
    {
        $branch = $this->model->findOrFail($id);
        $branch->address_en = request('address_en');
        $branch->address_ar = request('address_ar');
        $branch->mob1 = request('mob1');
        $branch->mob2 = request('mob2');
        $branch->update();

        if (request('sunday')) {
            $info = BranchInfo::where('branch_id', $id)->where('day', 'sunday')->first();
            $info->from = request('working_from_sunday');
            $info->to = request('working_to_sunday');
            $info->update();
        }

        if (request('monday')) {

            $info = BranchInfo::where('branch_id', $id)->where('day', 'monday')->first();
            $info->from = request('working_from_monday');
            $info->to = request('working_to_monday');
            $info->update();
        }

        if (request('tuesday')) {

            $info = BranchInfo::where('branch_id', $id)->where('day', 'tuesday')->first();
            $info->from = request('working_from_tuesday');
            $info->to = request('working_to_tuesday');
            $info->update();
        }

        if (request('wednesday')) {

            $info = BranchInfo::where('branch_id', $id)->where('day', 'wednesday')->first();
            $info->from = request('working_from_wednesday');
            $info->to = request('working_to_wednesday');
            $info->update();
        }

        if (request('thursday')) {
            $info = BranchInfo::where('branch_id', $id)->where('day', 'thursday')->first();
            $info->from = request('working_from_thursday');
            $info->to = request('working_to_thursday');
            $info->update();
        }

        if (request('friday')) {
            $info = BranchInfo::where('branch_id', $id)->where('day', 'friday')->first();
            $info->from = request('working_from_friday');
            $info->to = request('working_to_friday');
            $info->update();
        }

        if (request('saturday')) {
            $info = BranchInfo::where('branch_id', $id)->where('day', 'saturday')->first();
            $info->from = request('working_from_saturday');
            $info->to = request('working_to_saturday');
            $info->update();
        }
    }
}
