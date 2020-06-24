<?php

namespace App\Http\Controllers\user;

use App\Boards;
use App\Category;
use App\Color;
use App\CompareProducts;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRateRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\shareEmailRequest;
use Mail;
use App\Material;
use App\Offer;
use App\Product;
use App\ProductImage;
use App\Services\site\OfferService;
use App\Services\site\ProductReviewService;
use App\Services\site\ProductService;
use App\Services\site\ShowroomService;
use App\Showroom;
use App\Style;
use App\Upholstery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ShareProductMail;
use App\Services\site\CategoryService;
use App\Services\site\ColorService;
use App\Services\site\CountryService;
use App\Services\site\MaterialService;
use App\Services\site\StyleService;
use App\Services\site\UpholsteryService;
use App\Services\site\ProductCompareService;
use Illuminate\Validation\ValidationException;
use App\Services\site\CityService;

class OfferController extends Controller
{
    protected $request;
    protected $product_service;

    public function __construct(Request $request, ProductService $product_service)
    {
        $this->request = $request;
        $this->product_service = $product_service;
    }

    public function getSingleOffer($id)
    {
        if (auth()->guard('user')->check()) {
            $boards = auth()->guard('user')->user()->boards;
        } else {
            $boards = [];
        }

        $product = $this->product_service->getSingleProduct($id);

        return view('frontend.products.view', compact(['product', 'boards']));
    }

    public function getOffers(StyleService $styleService, CategoryService $categoryService, OfferService $offer_service)
    {
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $offers = $offer_service->getOffers($perPage = 40, $sortBy = 'created_at');
        $featured_stores = ['test'];
        return view('frontend.products.offers', compact('offers', 'categories', 'styles', 'featured_stores'));
    }

    public function getOffersAjex(StyleService $styleService, CategoryService $categoryService, OfferService $offer_service)
    {
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $offers = $offer_service->getOffers($perPage = 40, $sortBy = 'created_at');
        $featured_stores = ['test'];
        return view('frontend.products.offer_data', compact('offers', 'featured_stores'))->render();
    }

    public function deleteOffer($showroom_id, $id, ShowroomService $showroomService)
    {
        $showroomService->getUserShowroom($showroom_id, auth('user')->user()->id);
        $this->product_service->deleteOffer($id);
        return redirect()->back()->withMessage('Offer Deleted Successfully');
    }

    public function advancedSearch(OfferService $offerService, StyleService $styleService, CategoryService $categoryService, CityService $cityService)
    {
        $categories = $categoryService->getAll();
        $cities = $cityService->getCities();
        $keyword = $this->request->keyword;
        $offers = $offerService->getOffers($perPage = 12, $sortBy = 'created_at');
        if (request()->ajax()) {
            return view('frontend.products.advanced_offer_data', compact('offers'))->render();
        }
        return view('frontend.search_layouts.advanced_search_offers', compact('cities', 'keyword', 'offers', 'categories'));
    }
}
