<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Style;

class StyleService
{
    private $style_model;
    private $request;

    public function __construct(Style $style_model, Request $request)
    {
        $this->style_model = $style_model;
        $this->request = $request;
    }

    public function getAllStyles()
    {
        $styles = $this->style_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $styles->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $styles = $styles->latest()->paginate(10);

        return $styles;
    }

    public function getSingleStyle($id)
    {
        return $this->style_model->findOrFail($id);
    }

    public function storeStyle()
    {
        $this->style_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function updateStyle($id)
    {
        $style = $this->getSingleStyle($id);

        $style->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function deleteStyle($id)
    {
        $style = $this->getSingleStyle($id);
        $style->delete();
    }
}
