<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Paragraph;
use Illuminate\Support\Facades\Storage;

class ParagraphService
{
    private $paragraph_model;
    private $request;

    public function __construct(Paragraph $paragraph_model, Request $request)
    {
        $this->paragraph_model = $paragraph_model;
        $this->request = $request;
    }

    public function getSingleParagraph($id)
    {
        return $this->paragraph_model->findOrFail($id);
    }

    public function store($ideaId)
    {
        $this->paragraph_model->create([
            'title_en' => $this->request->title_en,
            'title_ar' => $this->request->title_ar,
            'description_en' => $this->request->description_en,
            'description_ar' => $this->request->description_ar,
            'image' => $this->request->image,
            'position' => $this->request->position,
            'idea_id' => $ideaId,
            'active' => $this->request->active ? 1 : 0,
            'youtube_link' => $this->request->youtube_link
        ]);
    }

    public function update($id)
    {
        $paragraph = $this->getSingleParagraph($id);

        $paragraph->update([
            'title_en' => $this->request->title_en,
            'title_ar' => $this->request->title_ar,
            'description_en' => $this->request->description_en,
            'description_ar' => $this->request->description_ar,
            'image' => $this->request->image,
            'position' => $this->request->position,
            'active' => $this->request->active ? 1 : 0,
            'youtube_link' => $this->request->youtube_link
        ]);
    }

    public function delete($id)
    {
        $paragraph = $this->getSingleParagraph($id);
        if ($paragraph->getOriginal('image')) {
            Storage::disk('s3')->delete('Paragraphs/' . $paragraph->getOriginal('image'));
        }
        $paragraph->delete();
    }
}
