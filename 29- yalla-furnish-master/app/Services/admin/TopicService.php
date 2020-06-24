<?php

namespace App\Services\admin;

use App\Topic;
use App\TopicImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicService
{
    private $topic_model;
    private $request;

    public function __construct(Topic $topic_model, Request $request)
    {
        $this->topic_model = $topic_model;
        $this->request = $request;
    }

    public function getTopics()
    {
        $topics = $this->topic_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $topics->where(function ($query) use ($keyword) {
                $query->whereHas('categories', function ($query) use ($keyword) {
                    $query->where('name_en', 'LIKE', '%' . $keyword . '%')->orWhere('name_ar', 'LIKE', '%' . $keyword . '%');
                })->orWhereHas('user', function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%');
                });
            })->orWhere('body', 'LIKE', '%' . $keyword . '%');
        }

        $topics = $topics->latest()->paginate(10);

        return $topics;
    }

    public function getSingleTopic($id)
    {
        return $this->topic_model->findOrFail($id);
    }

    public function storeTopic()
    {
        $topic = $this->topic_model->create([
            'body' => $this->request->body,
            'link' => isset($this->request->link) ? $this->request->link : null,
            'user_id' => isset($this->request->user_id) ? $this->request->user_id : null,
        ]);

        $topic_image_model = new TopicImage;

        foreach ($this->request->images as $image) {
            $topic_image_model->addImageToTopic($image, $topic->id);
        }

        $topic->categories()->attach($this->request->categories);
    }

    public function updateTopic($topic)
    {
        $topic->body = $this->request->body;
        $topic->link = $this->request->link;
        $topic->user_id = $this->request->user_id;
        $topic_image_model = new TopicImage;
        if (isset($this->request->images)) {
            if (count($this->request->images) + count($topic->images) == 5) {
                foreach ($this->request->images as $image) {
                    $topic_image_model->addImageToTopic($image, $topic->id);
                }
            }
            if (count($this->request->images) + count($topic->images) <= 5) {
                foreach ($this->request->images as $image) {
                    $topic_image_model->addImageToTopic($image, $topic->id);
                }
            } else {
                return false;
            }
        }
        if (isset($this->request->categories) && count($this->request->categories) > 0) {
            $topic->categories()->sync($this->request->categories);
        }
        $topic->save();
    }
    public function removeImage($id, $image)
    {
        $topic_image = new TopicImage;
        $topic_image->find($id)->delete();
        Storage::disk('topics')->delete($image);
    }

    public function deleteTopic($id)
    {
        $topic = $this->getSingleTopic($id);

        $topic->delete();
    }
}
