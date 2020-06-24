<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Color;

class ColorService
{
    private $color_model;
    private $request;

    public function __construct(Color $color_model, Request $request)
    {
        $this->color_model = $color_model;
        $this->request = $request;
    }

    public function getAllColors()
    {
        $colors = $this->color_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $colors->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $colors = $colors->latest()->paginate(10);

        return $colors;
    }

    public function getSingleColor($id)
    {
        return $this->color_model->findOrFail($id);
    }

    public function storeColor()
    {
        $this->color_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'code' => $this->request->code,
        ]);
    }

    public function updateColor($id)
    {
        $color = $this->getSingleColor($id);

        $color->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'code' => $this->request->code,
        ]);
    }

    public function deleteColor($id)
    {
        $color = $this->getSingleColor($id);
        $color->delete();
    }
}
