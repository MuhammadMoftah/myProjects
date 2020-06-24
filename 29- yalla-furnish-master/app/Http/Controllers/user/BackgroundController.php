<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\BackgroundService;
use App\Services\site\ProductService;
use App\Http\Requests\BackgroundUploadRequest;
use App\Services\site\CategoryService;
use App\Services\site\ColorService;
use App\Services\site\StyleService;

class BackgroundController extends Controller
{
    protected $background_service;

    public function __construct(BackgroundService $background_service)
    {
        $this->background_service = $background_service;
    }

    public function uploadBackground(BackgroundUploadRequest $request)
    {
        return $this->background_service->uploadBackground();
    }

    public function getBackgroundSet()
    {
        $backgrounds = $this->background_service->getAllBackgrounds();
        $user = auth()->guard('user')->user();
        return view('frontend.design.setBackground', compact('backgrounds', 'user'));
    }

    public function getDesign($background, ProductService $product_service, CategoryService $categoryService, StyleService $styleService, ColorService $colorService)
    {
        $background = $this->background_service->getSelectedImage($background);
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $colors = $colorService->getAll();
        $products = $product_service->filterProduct();

        if (request()->ajax()) {
            return view('frontend.includes.design_products', compact('products'));
        }
        return view('frontend.design.Design', compact('background', 'products', 'styles', 'categories', 'colors'));
    }

    public function storeBackground()
    {
        $image_url = $this->background_service->storeImage(request('type'), request('image'));
        return $image_url;
    }
}
