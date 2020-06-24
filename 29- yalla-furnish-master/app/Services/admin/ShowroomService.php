<?php

namespace App\Services\admin;

use App\Showroom;
use App\Services\admin\BranchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendNotification;

class ShowroomService
{
  private $showroom_model;
  private $request;
  private $branch_service;

  public function __construct(Showroom $showroom_model, Request $request, BranchService $branch_service)
  {
    $this->showroom_model = $showroom_model;
    $this->request = $request;
    $this->branch_service = $branch_service;
  }

  public function storeShowroom()
  {
    $showroom = $this->showroom_model->create([
      'name_en' => $this->request->name_en,
      'name_ar' => $this->request->name_ar,
      'about' => $this->request->about,
      'yt' => $this->request->youtube,
      'fb' => $this->request->facebook,
      'website' => $this->request->website,
      'instgram' => $this->request->instgram,
      'tw' => $this->request->twitter,
      'showroom_image' => $this->request->showroom_image,
      'showroom_coverImage' => $this->request->background_image,
      'district_id' => $this->request->district_id,
      'user_id' => $this->request->user_id,
      'active' => 1,
      'slug' => $this->request->slug
    ]);

    $showroom->styles()->attach($this->request->styles);
    $showroom->categories()->attach($this->request->categories);

    if ($this->request->malls) {
      $showroom->malls()->attach($this->request->malls);
    }

    $this->branch_service->storeNewBranch($showroom->id);

    return $showroom;
  }

  public function update($id)
  {
    $showroom = $this->getSingleShowroom($id);

    $showroom->update([
      'name_ar' => $this->request->name_ar,
      'name_en' => $this->request->name_en,
      'yt' => $this->request->youtube,
      'tw' => $this->request->twitter,
      'website' => $this->request->website,
      'fb' => $this->request->facebook,
      'instgram' => $this->request->instgram,
      'about' => $this->request->about,
      'district_id' => $this->request->district_id,
      'showroom_image' => $this->request->image,
      'showroom_coverImage' => $this->request->cover,
      'user_id' => $this->request->user_id,
      'slug' => $this->request->slug
    ]);

    if (isset($this->request->categories) && count($this->request->categories) > 0) {
      $showroom->categories()->sync($this->request->categories);
    }

    if (isset($this->request->styles) && count($this->request->styles) > 0) {
      $showroom->styles()->sync($this->request->styles);
    }

    if (isset($this->request->malls) && count($this->request->malls) > 0) {
      $showroom->malls()->sync($this->request->malls);
    }
  }

  public function getSingleShowroom($id)
  {
    return $this->showroom_model->findOrFail($id);
  }

  public function deleteShowroom($id)
  {
    $showroom = $this->getSingleShowroom($id);
    $showroom->delete();
  }

  public function changeStatus($id)
  {
    $showroom = $this->getSingleShowroom($id);

    $showroom->active ? $showroom->update(['active' => 0]) : $showroom->update(['active' => 1]);
  }
  public function changeApproval($id)
  {
    $showroom = $this->getSingleShowroom($id);
    $showroom->approve = 1;
    $showroom->save();

    Notification::send($showroom->user, new SendNotification([
      'type' => \App\Showroom::class,
      'typeId' => $showroom->id,
      'url' => route('user.get.singleShowroom', $showroom->slug),
      'text' => "Admin Approve Your Showroom : $showroom->name_en"
    ]));
  }


  public function dismissShowroom($id, $reason)
  {
    $showroom = $this->getSingleShowroom($id);
    $showroom->update(['active' => 0, 'reason' => $reason]);

    Notification::send($showroom->user, new SendNotification([
      'type' => \App\Showroom::class,
      'typeId' => $showroom->id,
      'url' => route('user.get.singleShowroom', $showroom->slug),
      'text' => "Admin Dismiss Your Showroom : $showroom->name_en with Reason : $reason"
    ]));
  }

  public function getShowroomsCount()
  {
    return $this->showroom_model->count();
  }
}
