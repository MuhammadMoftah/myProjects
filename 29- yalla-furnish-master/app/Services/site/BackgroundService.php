<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Background;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BackgroundService
{
    private $background_model;
    private $request;

    public function __construct(Background $background_model, Request $request)
    {
        $this->background_model = $background_model;
        $this->request = $request;
    }

    public function uploadBackground()
    {
        $image = $this->request->image;

        $image_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('s3')->put('users_backgrounds/' . $image_name, File::get($image))) {
            throw new \Exception('error in uploading image');
        }

        return route('user.design', ['background' => $image_name, 'type' => 'user']);
    }

    public function getAllBackgrounds()
    {
        $scratches = $this->background_model->whereType(1)->get();
        $woods = $this->background_model->whereType(2)->get();
        $plans = $this->background_model->whereType(3)->get();

        $backgrounds = [$scratches, $woods, $plans];

        return $backgrounds;
    }

    public function getSelectedImage($background)
    {
        return $this->background_model->getUserBackground($background);
    }

    public function storeImage($type, $image)
    {
        $contents = file_get_contents($image);
        $image_name = $type . time() . uniqid() . '_' . auth()->guard('user')->user()->id . '.jpg';
        if (!Storage::disk('temps')->put($image_name, $contents)) {
            throw new \Exception('error in uploading image');
        }

        return asset('storage/temps/' . $image_name);
    }
}
