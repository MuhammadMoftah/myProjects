<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\ShowroomReview;

class ShowroomReviewService
{
    protected $request;
    protected $showroomReviewModel;

    public function __construct(Request $request, ShowroomReview $showroomReviewModel)
    {
        $this->request = $request;
        $this->showroomReviewModel = $showroomReviewModel;
    }

    public function getShowroomReviews($id, $perPage)
    {
        return $this->showroomReviewModel->where('showroom_id', $id)->with('user')->latest()->paginate($perPage);
    }

    public function storeReview($userId)
    {
        $showroom_review = $this->showroomReviewModel;
        $services = request('services');
        if (array_search('services', $services, true) !== false) {
            $showroom_review->services = 1;
        }
        if (array_search('sales', $services, true) !== false) {
            $showroom_review->sales = 1;
        }
        if (array_search('prices', $services, true) !== false) {
            $showroom_review->prices = 1;
        }
        if (array_search('qualities', $services, true) !== false) {
            $showroom_review->qualities = 1;
        }
        if (array_search('others', $services, true) !== false) {
            $showroom_review->others = 1;
        }

        $showroom_review->review = request('review');
        $showroom_review->rate = request('rate');
        $showroom_review->showroom_id = request('showroom_id');
        $showroom_review->user_id = $userId;
        $showroom_review->save();
    }

    public function checkReview($showroomId, $userId)
    {
        return $this->showroomReviewModel->where([
            'showroom_id' => $showroomId,
            'user_id' => $userId
        ])->first();
    }
}
