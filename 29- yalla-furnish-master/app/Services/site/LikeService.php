<?php

namespace App\Services\site;

use App\Like;
use Illuminate\Http\Request;
use App\Activity;
use App\Notifications\SendNotification;

class LikeService
{
    private $like_model;
    private $request;

    public function __construct(Like $like_model, Request $request)
    {
        $this->like_model = $like_model;
        $this->request = $request;
    }

    public function getSingleLike($id, $type, $userId)
    {
        return $this->like_model->where([
            'item_id' => $id,
            'type' => $type,
            'user_id' => $userId,
        ])->first();
    }

    public function likeItem($id, $type, $userId)
    {
        $like = $this->getSingleLike($id, $type, $userId);
        $types = ['idea', 'topic', 'product', 'showroom_review', 'comment', 'reply'];
        if ($like) {
            if ($type == 'idea') {
                $likes_count = $like->idea->likes->count() - 1;
            } elseif ($type == 'topic') {
                $likes_count = $like->topic->likes->count() - 1;
            } elseif ($type == 'product') {
                $likes_count = $like->product->likes->count() - 1;
            } elseif ($type == 'showroom_review') {
                $likes_count = $like->ShowroomReview->likes->count() - 1;
            } elseif ($type == 'comment') {
                $likes_count = $like->comment->likes->count() - 1;
            } elseif ($type == 'reply') {
                $likes_count = $like->reply->likes->count() - 1;
            }
            $like->delete();
            return [null, $likes_count];
        }

        if (!in_array($type, $types)) {
            abort(404);
        }

        $like = $this->like_model->create([
            'user_id' => $userId,
            'item_id' => $id,
            'type' => $type,
        ]);

        $activity = new Activity;
        if ($type == 'idea') {
            $link = route('user.get.idea', $id);
            $likes_count = $like->idea->likes->count();
        } elseif ($type == 'topic') {
            $link = route('user.get.topic', $id);
            $likes_count = $like->topic->likes->count();
        } elseif ($type == 'product') {
            $link = route('user.product.get', $id);
            $likes_count = $like->product->likes->count();
        } elseif ($type == 'showroom_review') {
            $likes_count = $like->ShowroomReview->likes->count();
        } elseif ($type == 'comment') {
            $likes_count = $like->comment->likes->count();
        } elseif ($type == 'reply') {
            $likes_count = $like->reply->likes->count();
        }

        // send like product notification
        if ($type == "product" && $userId != $like->product->showroom->user->id) {
            $user = $like->user;
            $product = $like->product;
            $like->product->showroom->user->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => $link,
                'text' => "$user->first_name Liked $product->name_en"
            ]));
        }

        if (isset($link)) {
            $activity->create([
                'user_id' => $userId,
                'activity' => 'Liked <a href="' . $link . '">This Item</a>'
            ]);
        }

        $like->likes_count = $likes_count;

        return [$like, $likes_count];
    }
}
