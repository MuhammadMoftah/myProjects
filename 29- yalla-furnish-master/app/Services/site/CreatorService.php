<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Idea;
use Illuminate\Support\Facades\Storage;

class CreatorService
{
    private $idea_model;
    private $request;

    public function __construct(Idea $idea_model, Request $request)
    {
        $this->idea_model = $idea_model;
        $this->request = $request;
    }

    public function getSingleIdea($id)
    {
        return $this->idea_model->active()->where('id', $id)->firstOrFail();
    }

    public function storeIdea()
    {
        $idea = $this->idea_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'user_id' => auth()->guard('user')->user()->id,
            'desc_en' => $this->request->description_en,
            'desc_ar' => $this->request->description_ar,
            'idea_image' => $this->request->idea_image,
            'active' => 0
        ]);

        $idea->categories()->attach($this->request->categories);

        return $idea->id;
    }

    public function editIdea($idea)
    {
        $idea->name_en = request('name_en');
        $idea->name_ar = request('name_ar');
        $idea->desc_en = request('description_en');
        $idea->desc_ar = request('description_ar');
        $idea->idea_image = request('idea_image');
        $idea->categories()->sync($this->request->categories);
        $idea->update();
    }

    public function deleteIdea($id)
    {
        $idea = $this->getSingleIdea($id);
        Storage::disk('ideas')->delete($idea->getOriginal('idea_image'));
        $idea->delete();
    }
}
