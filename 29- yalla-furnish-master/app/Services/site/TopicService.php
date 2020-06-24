<?php

namespace App\Services\site;

use App\Services\site\ShareService;
use App\Topic;
use App\TopicImage;
use App\UserUpdate;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ShareTopicMail;
use App\Traits\CacheKeyTrait;

class TopicService
{
    use CacheKeyTrait;

    private $topic_model;
    private $request;
    private $share_service;

    public function __construct(Topic $topic_model, Request $request, ShareService $share_service)
    {
        $this->topic_model = $topic_model;
        $this->request = $request;
        $this->share_service = $share_service;
    }

    public function getAllTopics($perPage = 10, $user = null)
    {
        $topics = $this->topic_model->newQuery();
        $keyword = $this->request->keyword;
        // filter by keyword
        if (isset($this->request->keyword)) {
            $topics->where('body', 'LIKE', '%' . $keyword . '%');
        }
        // filter by category
        if (isset($this->request->category)) {
            $category_id = $this->request->category;
            $topics->whereHas('categories', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        }
        // filter by following
        if (isset($this->request->by_following) && $user) {
            $followings_ids = $user->followings()->pluck('following_id')->toArray();
            $topics->whereHas('user', function ($query) use ($followings_ids) {
                $query->whereIn('id', $followings_ids);
            });
        }
        return $topics->with(['comments', 'categories'])->latest()->paginate($perPage);
    }

    public function getSingleTopic($id)
    {
        return $this->topic_model->with(['categories', 'comments'])->where('id', $id)->firstOrFail();
    }

    public function storeTopic()
    {

        $topic = $this->topic_model->create([
            'body' => $this->request->body,
            'link' => isset($this->request->link) ? $this->request->link : null,
            'user_id' => auth()->guard('user')->user()->id,
        ]);
        $topic_image_model = new TopicImage();
        foreach ($this->request->images as $image) {
            $topic_image_model->addImageToTopic($image, $topic->id);
        }
        $topic->categories()->attach($this->request->categories);
        UserUpdate::create([
            'user_id' => auth()->guard('user')->user()->id,
            'topic_id' => $topic->id,
        ]);
    }
    public function updateTopic($id)
    {
        $topic = Topic::findOrFail($id);
        if ($topic->user_id === CurrentUser()->id) {
            $topic->update([
                'body' => $this->request->body,
                'link' => isset(request()->link) ? request()->link : null,
            ]);
            // if (request()->has('images')) {
            //     if ($topic->images()) {
            //         $topic->images()->delete();
            //     }
            //     $topic_image_model = new TopicImage();
            //     foreach (request()->images as $image) {
            //         $topic_image_model->addImageToTopic($image, $topic->id);
            //     }
            // }
        } else {
            abort(403);
        }

        if (request()->has('categories')) {
            $topic->categories()->sync($this->request->categories);
        }

        UserUpdate::create([
            'user_id' => auth()->guard('user')->user()->id,
            'topic_id' => $topic->id,
        ]);

        return $topic;
    }

    public function shareTopic($id, $provider)
    {
        $topic = $this->getSingleTopic($id);
        $this->share_service->storeShare($topic->id, 'topic');
        $link = route('user.get.topic', $topic->id);
        if ($provider == 'facebook') {
            $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }
        if ($provider == 'twitter') {
            $share_link = 'https://www.twitter.com/intent/tweet?url=' . $link;
        }
        if ($provider == 'linkedin') {
            $share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link;
        }
        if ($provider == 'tumblr') {
            $share_link = 'https://www.tumblr.com/share/link?url=' . $link;
        }

        return $share_link;
    }

    public function getUserTopics($userId)
    {
        return $this->topic_model->where('user_id', $userId)->latest()->paginate(5);
    }
}
