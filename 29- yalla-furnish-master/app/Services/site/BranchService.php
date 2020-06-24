<?php

namespace App\Services\site;

use App\Branch;
use App\BranchInfo;
use Illuminate\Http\Request;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Notification;

class BranchService
{
    private $branch_model;
    private $request;

    public function __construct()
    {
        $this->branch_model = new Branch;
        $this->request = new Request;
    }

    public function storeNewBranch($showroom_id)
    {
        $branch = $this->branch_model->create([
            'title' => request('title'),
            'address_en' => request('address_en'),
            'address_ar' => request('address_ar'),
            'mob1' => request('mob1'),
            'mob2' => request('mob2'),
            'lat' => request('lat'),
            'lang' => request('lang'),
            'city_id' => request('branch_city'),
            'district_id' => request('branch_district'),
            'showroom_id' => $showroom_id
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
        // send notification 
        $branch->load(["showroom.followers"]);
        Notification::send($branch->showroom->followers, new SendNotification([
            'type'   => Branch::class,
            'typeId' => $branch->id,
            'url'    => route('user.get.singleShowroom', ['slug' => $branch->showroom->slug, 'tab' => 'info']),
            'text'   => "{$branch->showroom->name_en} add new branch"
        ]));
    }

    public function getSingleBranch($id)
    {
        return $this->branch_model->findOrFail($id);
    }

    public function updateBranch($id)
    {
        $branch = $this->getSingleBranch($id);
        $branch->info()->delete();
        $branch->update([
            'title' => request('title'),
            'address_en' => request('address_en'),
            'address_ar' => request('address_ar'),
            'mob1' => request('mob1'),
            'mob2' => request('mob2'),
            'lat' => request('lat'),
            'lang' => request('lang'),
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
}
