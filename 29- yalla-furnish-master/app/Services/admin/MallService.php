<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Mall;

class MallService
{
    private $mall_model;
    private $request;

    public function __construct(Mall $mall_model, Request $request)
    {
        $this->mall_model = $mall_model;
        $this->request = $request;
    }

    public function getAllMalls()
    {
        $malls = $this->mall_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $malls->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $malls = $malls->latest()->paginate(10);

        return $malls;
    }

    public function getSingleMall($id)
    {
        return $this->mall_model->findOrFail($id);
    }

    public function storeMall()
    {
        $this->mall_model->create([
            'name' => $this->request->name,
            'about' => $this->request->about,
            'image' => $this->request->image,
            'cover' => $this->request->cover,
            'location' => $this->request->location,
            'facebook' => $this->request->facebook,
            'twitter' => $this->request->twitter,
            'instagram' => $this->request->instagram,
            'opening_hours' => $this->request->opening_hours,
            'lat' => $this->request->lat,
            'lng' => $this->request->lng,
            'active' => $this->request->active,
        ]);
    }

    public function updatemall($id)
    {
        $mall = $this->getSingleMall($id);

        $mall->name = $this->request->name;
        $mall->about = $this->request->about;
        $mall->facebook = $this->request->facebook;
        $mall->twitter = $this->request->twitter;
        $mall->instagram = $this->request->instagram;
        $mall->location = $this->request->location;
        $mall->opening_hours = $this->request->opening_hours;
        $mall->lat = $this->request->lat;
        $mall->lng = $this->request->lng;
        $mall->active = $this->request->active;

        if ($this->request->image) {
            $mall->image = $this->request->image;
        }

        if ($this->request->cover) {
            $mall->cover = $this->request->cover;
        }

        $mall->save();
    }

    public function deletemall($id)
    {
        $mall = $this->getSingleMall($id);
        $mall->delete();
    }
}
