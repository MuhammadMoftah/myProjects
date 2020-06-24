<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Color;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\DismissRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Material;
use App\Product;
use App\Services\admin\ProductImageService;
use App\Services\admin\ProductService;
use App\Showroom;
use App\Style;
use App\Offer;
use App\Upholstery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    protected $request;
    protected $product_model;
    private $productService;

    public function __construct(Request $request, Product $product_model, ProductService $productService)
    {
        $this->product_model = $product_model;
        $this->request = $request;
        $this->productService = $productService;

        $this->middleware('permission:product-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['getCreate', 'postCreate']]);
        $this->middleware('permission:product-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:approve-product', ['only' => ['approveProduct', 'dismissProduct']]);
        $this->middleware('permission:product-delete', ['only' => ['delete']]);
    }

    public function getCreate(Upholstery $upholstery_model, Country $country_model, Showroom $showroom_model, Style $style_model, Category $category_model, Color $color_model, Material $material_model)
    {
        $styles = $style_model->get();
        $categories = $category_model->get();
        $colors = $color_model->get();
        $materials = $material_model->get();
        $showrooms = $showroom_model->active()->get();
        $countries = $country_model->get();
        $upholsteries = $upholstery_model->get();

        return view('admin.pages.products.create', compact('upholsteries', 'countries', 'styles', 'categories', 'colors', 'materials', 'showrooms'));
    }

    public function postCreate(StoreProductRequest $request)
    {
        $this->checkDescriptionBody();
        try {
            DB::beginTransaction();
            $this->productService->storeProduct();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage(), 'code' => 500]);
        }

        return response()->json(['message' => 'product added successfully', 'code' => 200]);
    }

    public function getEdit($id, Upholstery $upholstery_model, Country $country_model, Showroom $showroom_model, Style $style_model, Category $category_model, Color $color_model, Material $material_model)
    {
        $styles = $style_model->get();
        $categories = $category_model->get();
        $colors = $color_model->get();
        $materials = $material_model->get();
        $showrooms = $showroom_model->active()->get();
        $countries = $country_model->get();
        $upholsteries = $upholstery_model->get();
        $product = $this->productService->getProduct($id);

        $showroom = $showroom_model->findOrFail($product->showroom_id);

        $branches = $showroom->branches;

        return view('admin.pages.products.edit', compact(
            'upholsteries',
            'countries',
            'styles',
            'categories',
            'colors',
            'materials',
            'showrooms',
            'product',
            'branches'
        ));
    }

    public function postEdit($id, EditProductRequest $request)
    {
        $this->checkDescriptionBody();
        try {
            DB::beginTransaction();

            if (!$this->productService->updateProduct($id)) {
                return back()->withErrors('you only can have up to 5 images for the product');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return redirect()->route('admin.products.index')->withMessage('Product Updated Successfully');
    }

    public function deleteImage($id, $product_id, ProductImageService $product_image_service)
    {
        $product = $this->productService->getProduct($product_id);

        if (count($product->images) == 1) {
            return back()->withErrors('you cant delete the last image');
        }

        $product_image_service->deleteImage($id);

        return back();
    }

    // approve product
    public function approveProduct($id)
    {
        $this->productService->approveProduct($id);
        return back();
    }

    // approve product
    public function dismissProduct($id, DismissRequest $request)
    {
        $this->productService->dismissProduct($id, $request->reason);
        return response()->json(['code' => 200, 'message' => 'product has been dismissed']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = $this->productService->getAllProducts();
        $offersCount = Offer::count();
        if (request()->ajax()) {
            return view('admin.pages.products.products_data', compact('products'))->render();
        }
        return view('admin.pages.products.index', compact('products', 'offersCount'));
    }

    public function show(int $id)
    {
        $product = $this->productService->getProduct($id);
        return view('admin.pages.products.details', compact('product'));
    }

    public function delete($id)
    {
        $this->productService->deleteProduct($id);

        return redirect()->route('admin.products.index')->withMessage('Product Deleted Successfully');
    }

    public function stripDescriptionBody()
    {

        request()->merge(['description_en' =>    strip_tags(request()->description_en, '<br><p>')]);
        request()->merge(['description_ar' =>    strip_tags(request()->description_ar, '<br><p>')]);
        request()->merge(['others' =>    strip_tags(request()->others, '<br><p>')]);
    }

    public function checkDescriptionBody()
    {

        $this->stripDescriptionBody();
        $ar_desc = trim(str_replace(["&nbsp;", "<br>", "<p>", "</p>"], ["", "", "", ""],   request()->description_ar));
        $en_desc = trim(str_replace(["&nbsp;", "<br>", "<p>", "</p>"], ["", "", "", ""],   request()->description_en));
        $others = trim(str_replace(["&nbsp;", "<br>", "<p>", "</p>"], ["", "", "", ""],   request()->others));
        if ($others == '') {
            request()->merge(['others' =>    '']);
        }
        if ($ar_desc == '' ||  $en_desc == '') {
            throw ValidationException::withMessages(['Description' => 'Empty Description']);
        }
    }
}
