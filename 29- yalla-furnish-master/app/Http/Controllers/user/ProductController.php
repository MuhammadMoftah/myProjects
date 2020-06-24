<?php

namespace App\Http\Controllers\user;

use Mail;
use App\Color;
use App\Offer;
use App\Style;
use App\Boards;
use App\Country;
use App\Product;
use App\Category;
use App\Material;
use App\Showroom;
use App\Upholstery;
use App\ProductImage;
use App\CompareProducts;
use Illuminate\Http\Request;
use App\Mail\ShareProductMail;
use App\Services\site\CityService;
use Illuminate\Support\Facades\DB;
use App\Services\site\ColorService;
use App\Services\site\OfferService;
use App\Services\site\StyleService;
use App\Http\Controllers\Controller;
use App\Services\site\CountryService;
use App\Services\site\ProductService;
use App\Http\Requests\RequestAskPrice;
use App\Services\site\CategoryService;
use App\Services\site\MaterialService;
use App\Services\site\ShowroomService;
use App\Http\Requests\shareEmailRequest;
use App\Services\site\UpholsteryService;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRateRequest;
use App\Http\Requests\StoreProductRequest;
use App\Services\site\ProductReviewService;
use App\Services\site\ProductCompareService;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    protected $request;
    protected $product_service;

    public function __construct(Request $request, ProductService $product_service)
    {
        $this->request = $request;
        $this->product_service = $product_service;
    }

    public function requestPrice(RequestAskPrice $request){

            $this->product_service->askRequest($request);
            return back()->with("successSafwat", "Send Request Successfully");
    }

    public function getProducts($categorySlug = null, StyleService $styleService, CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $products = $this->product_service->getProducts();
        $featured_stores = ['test'];

        if ($this->request->by_category) {
            return view('frontend.products.products', compact('products', 'styles', 'categories', 'featured_stores'));
        } elseif ($this->request->ajax()) {
            return view('frontend.products.products_data', compact('products', 'featured_stores'));
        }

        $pageTitle = $categorySlug ?  ucfirst($categorySlug) . ' | Yalla Furnish' : 'Yalla furnish';

        return view('frontend.products.products', compact('products', 'styles', 'categories', 'featured_stores', 'pageTitle'));
    }

    public function getProductsAjex($category = null, StyleService $styleService, CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $products = $this->product_service->getProducts();
        $featured_stores = ['test'];
        return view('frontend.products.products_data', compact('products', 'featured_stores'))->render();
    }

    public function getSingleProduct($id)
    {
        $boards = [];
        $this->product_service->setSessionPrevious();
        $product = $this->product_service->getSingleProduct($id);
        if (auth()->guard('user')->check()) {
            $boards = auth()->guard('user')->user()->boards;
        }
        return view('frontend.products.view', compact(['product', 'boards']));
    }

    public function getCreateProduct($showroom_id, ShowroomService $showroomService, UpholsteryService $upholsteryService, CountryService $countryService, StyleService $styleService, ColorService $colorService, MaterialService $materialService)
    {
        $showroom = $showroomService->getUserShowroom($showroom_id, auth('user')->user()->id);
        $styles = $styleService->getAll();
        $colors = $colorService->getAll();
        $materials = $materialService->getAll();
        $countries = $countryService->getAll();
        $upholsteries = $upholsteryService->getAll();
        $categories = $showroom->categories;
        if ($showroom->user_id == auth()->guard('user')->user()->id) {
            return view('frontend.products.createProduct', compact('upholsteries', 'countries', 'styles', 'categories', 'colors', 'materials', 'showroom'));
        } else {
            abort(404);
        }
    }

    public function postCreateProduct($showroom_id, StoreProductRequest $request, ShowroomService $showroom_service)
    {
        $this->checkDescriptionBody();
        try {
            DB::beginTransaction();
            $showroom_service->getUserShowroom($showroom_id, auth('user')->user()->id);
            $product = $this->product_service->storeProduct();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => $e->getMessage()]);
        }

        return response()->json(['code' => 200, 'message' => 'Product Created Successfully']);
    }

    public function shareProduct($id, $provider)
    {
        $share_link = $this->product_service->shareProduct($id, $provider);

        return redirect()->away($share_link);
    }

    public function CompareProduct($product_id, ProductCompareService $compareService)
    {
        $user_id = auth()->guard('user')->user()->id;

        $productExist = $compareService->checkIfProductExist($user_id, $product_id);
        if ($productExist) {
            return response()->json(['message' => 'Product Already Exist']);
        }

        $canCompare = $compareService->checkForCompare($user_id);
        if (!$canCompare) {
            return response()->json(['message' => 'You Already Added 4 Products']);
        }

        $compareService->addToCompare($user_id, $product_id);
        return response()->json(['message' => 'Product Added Successfully']);
    }

    public function get_comparison_table(CompareProducts $compare)
    {
        $user_id = auth()->guard('user')->user()->id;
        $products = $compare->where('user_id', $user_id)->get();
        return view('frontend.products.comparison_table', compact('products'));
    }

    public function delete_comparison_table_product($product_id, CompareProducts $compare)
    {
        $user_id = auth()->guard('user')->user()->id;
        $compare->where('product_id', $product_id)->where('user_id', $user_id)->delete();
        return redirect()->back()->with('delete', 'success');
    }

    public function rateProduct($id, ProductRateRequest $request, ProductReviewService $product_review_service)
    {
        $product = $this->product_service->getSingleProduct($id);

        $review = $product_review_service->checkReview($product->id);

        if ($review) {
            return response()->json(['code' => 200, 'message' => 'You Already Rated This Product']);
        }

        $product_review_service->rateProduct($product->id);

        return response()->json(['code' => 200, 'message' => 'Product Rated Successfully']);
    }

    public function getEditProduct($showroom_id, $id, ShowroomService $showroomService, UpholsteryService $upholsteryService, CountryService $countryService, StyleService $styleService, ColorService $colorService, MaterialService $materialService)
    {
        $styles = $styleService->getAll();
        $colors = $colorService->getAll();
        $materials = $materialService->getAll();
        $countries = $countryService->getAll();
        $upholsteries = $upholsteryService->getAll();
        $showroom = $showroomService->getUserShowroom($showroom_id, auth('user')->user()->id);
        $categories = $showroom->categories;
        $product = $this->product_service->getSingleProduct($id);

        return view('frontend.products.edit', compact('product', 'showroom', 'upholsteries', 'countries', 'styles', 'categories', 'colors', 'materials'));
    }

    public function postEditProduct($showroom_id, $id, EditProductRequest $request, ShowroomService $showroom_service)
    {
        $this->checkDescriptionBody();
        try {
            DB::beginTransaction();
            $showroom_service->getUserShowroom($showroom_id, auth('user')->user()->id);
            $this->product_service->updateProduct($id, $showroom_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['code' => 200, 'message' => 'Product Updated Successfully']);
    }

    public function deleteProductImage($id, $product_id, ProductImage $image)
    {
        $count = $image->where('product_id', $product_id)->count();
        if ($count > 1) {
            $image->findOrFail($id)->delete();
            return redirect()->back()->with('success', 'image Deleted Successfully ');
        } else {
            return redirect()->back()->with('error', 'Product Must Have At Least One Image');
        }
    }

    public function deleteProduct($showroom_id, $id, ShowroomService $showroom_service)
    {
        $showroom_service->getUserShowroom($showroom_id, auth('user')->user()->id);
        $this->product_service->deleteProduct($id);
        return redirect()->back()->withMessage('Product Deleted Successfully ');
    }

    public function storeProductInSession($id)
    {
        $this->product_service->storeProductInSession($id);
        $used_products = $this->product_service->getUsersProducts();
        return view('frontend.includes.user_products', compact('used_products'))->render();
    }

    public function removeProductInSession($id)
    {
        $this->product_service->removeProductFromSession($id);
        $used_products = $this->product_service->getUsersProducts();
        return view('frontend.includes.user_products', compact('used_products'))->render();
    }

    public function clearProductsSession()
    {
        return $this->product_service->clearProductsSession();
    }

    public function getEmailShare($id)
    {
        $product = $this->product_service->getSingleProduct($id);
        return view('frontend.products.shareEmail', compact('product'));
    }

    public function postEmailShare($id, shareEmailRequest $request)
    {
        $url = route('user.product.get', $id);
        if ($url) {
            Mail::to($request->email)->send(new ShareProductMail($url));
        }
        return back()->with('message', 'Thanks for contacting us!');
    }

    public function stripDescriptionBody()
    {
        request()->merge(['description_en' =>    strip_tags(request()->description_en, '<br><p>')]);
        request()->merge(['description_ar' =>    strip_tags(request()->description_ar, '<br><p>')]);
    }

    public function checkDescriptionBody()
    {
        $this->stripDescriptionBody();
        $ar_desc = trim(str_replace(["&nbsp;", "<br>", "<p>", "</p>"], ["", "", "", ""],   request()->description_ar));
        $en_desc = trim(str_replace(["&nbsp;", "<br>", "<p>", "</p>"], ["", "", "", ""],   request()->description_en));
        if ($ar_desc == '' ||  $en_desc == '') {
            throw ValidationException::withMessages(['Description' => 'Empty Description']);
        }
    }

    public function advancedSearch(CityService $cityService, CategoryService $categoryService, StyleService $styleService, ColorService $colorService)
    {
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $cities =  $cityService->getCities();
        $colors = $colorService->getAll();

        $keyword = $this->request->kwyword;
        $max_price = Product::select('price')
            ->orderBy('price', 'desc')
            ->limit(1)
            ->get();

        $products = $this->product_service->getProducts($perPage = 12);

        if ($this->request->ajax()) {
            return view('frontend.products.advanced_product_data', compact('products'))->render();
        }
        return view('frontend.search_layouts.advanced_search_products', compact('cities', 'max_price', 'keyword', 'colors', 'categories', 'styles', 'products'));
    }
}
