<?php

namespace App\Services\site;

use App\Offer;
use App\Product;
use App\Showroom;
use App\UserUpdate;
use App\Showroom_Messages;
use Illuminate\Http\Request;
use App\Traits\CacheKeyTrait;
use App\Services\site\OfferService;
use App\Services\site\ShareService;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Storage;
use App\Services\admin\ProductImageService;
use Illuminate\Support\Facades\Notification;

class ProductService
{
    use CacheKeyTrait;

    private $product_model;
    private $request;
    private $share_service;

    public function __construct(Product $product_model, Request $request, ShareService $share_service)
    {
        $this->product_model = $product_model;
        $this->request = $request;
        $this->share_service = $share_service;
    }

    public function setSessionPrevious()
    {
        if (!$this->product_model::isPreviosuProduct()) {
            session()->put("previous_page", url()->previous());
        }
    }

    public function getProducts($paginate = 42)
    {
        return cache()->remember(CacheKeyTrait::getProductsKey($paginate), env('SHORT_TIME_CACHE'), function () use ($paginate) {
            $products = $this->product_model->newQuery();

            // filter by keyword
            if (isset($this->request->keyword)) {
                $keyword = $this->request->keyword;
                $arr = explode(" ", $keyword);
                for ($i = 0; $i < count($arr); $i++) {
                    $products->where(function ($query) use ($arr, $i) {
                        $query->where(function ($query) use ($arr, $i) {
                            $query->where('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_en', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhere(function ($query) use ($arr, $i) {
                            $query->where('description_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('description_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('categories', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('showroom', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('style', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('color', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('showroom', function ($query) use ($arr, $i) {
                            $query->whereHas('branches', function ($query) use ($arr, $i) {
                                $query->where('address_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('address_ar', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhereHas('district', function ($query) use ($arr, $i) {
                                $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhereHas('city', function ($query) use ($arr, $i) {
                                        $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                            ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                                    });
                            });
                        });
                    });
                }
            }

            // filter by category
            if (isset($this->request->categorySlug)) {
                $categorySlug = $this->request->categorySlug;

                $products->whereHas('categories', function ($query) use ($categorySlug) {
                    $query->where('slug', $categorySlug);
                });
            }

            if (isset($this->request->category)) {
                $categoryId = $this->request->category;

                $products->whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
            }

            // filter by style
            if (isset($this->request->style)) {
                $products->where('style_id', $this->request->style);
            }

            // filter by price
            if (isset($this->request->price)) {
                $products->where('price', '<=', $this->request->price);
            }
            // filter by color
            if (isset($this->request->color)) {
                $products->where('color_id', $this->request->color);
            }
            // // filter by height
            if (isset($this->request->height)) {
                $products->where('height', $this->request->height);
            }
            // // filter by width
            if (isset($this->request->width)) {
                $products->where('width', $this->request->width);
            }
            // // filter by depth
            if (isset($this->request->depth)) {
                $products->where('depth', $this->request->depth);
            }
            // // filter by city
            if (isset($this->request->city)) {
                $city_id = $this->request->city;
                $products->whereHas('branches', function ($query) use ($city_id) {
                    $query->where('city_id', $city_id);
                });
            }
            // // filter by district
            if (isset($this->request->district)) {
                $district_id = $this->request->district;
                $products->whereHas('branches', function ($query) use ($district_id) {
                    $query->where('district_id', $district_id);
                });
            }

            return $products->approve()->latest()->with('comments', 'saves', 'likes', 'showroom', 'images', 'categories', 'reviews')->paginate($paginate);
        });
    }

    public function getSingleProduct($id)
    {
        return $this->product_model->approve()->where('id', $id)->with(['comments', 'reviews', 'saves', 'images', 'categories'])->firstOrFail();
    }

    public function getSingleProductShowroom($id, $showroom_id)
    {
        return $this->product_model->approve()->where('id', $id)
            ->where('showroom_id', $showroom_id)
            ->with(['comments', 'reviews', 'saves', 'images', 'categories'])
            ->firstOrFail();
    }

    public function getShowroomProducts($showroomId, $perPage = 24)
    {
        $products = $this->product_model->where([
            'showroom_id' => $showroomId,
        ]);

        if ($category = request('category')) {
            $products->whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }
        return $products->approve()->latest()->paginate($perPage);
    }

    public function storeProduct()
    {
        $product = $this->product_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'description_en' => $this->request->description_en,
            'description_ar' => $this->request->description_ar,
            'height' => $this->request->height,
            'width' => $this->request->width,
            'depth' => $this->request->depth,
            'color_id' => $this->request->color_id,
            'material_id' => $this->request->material_id,
            'country_id' => $this->request->country_id,
            'upholstery_id' => $this->request->upholstery_id,
            'price' => $this->request->price,
            'guarantee' => $this->request->guarantee,
            'others' => $this->request->others ? $this->request->others : null,
            'style_id' => $this->request->style_id,
            'showroom_id' => isset($this->request->showroom_id) ? $this->request->showroom_id : null,
        ]);

        $user_updates = new UserUpdate;
        $user_updates->create([
            'showroom_id' => isset($this->request->showroom_id) ? $this->request->showroom_id : null,
            'product_id' => $product->id,
        ]);

        $product_image_service = new ProductImageService;
        $product->categories()->attach($this->request->categories);
        $product->branches()->attach($this->request->branches);
        if (isset($this->request->has_offer)) {
            $showroom_id = isset($this->request->showroom_id) ? $this->request->showroom_id : null;
            $offer_service = new OfferService;
            $offer_service->storeOffer($product->id, $showroom_id);
        }

        foreach ($this->request->images as $image) {
            $product_image_service->addImage($image, $product->id);
        }

        Notification::send(getAdmins(), new SendNotification([
            'type' => \App\Product::class,
            'typeId' => $product->id,
            'url' => route('admin.products.view', $product->id),
            'text' => 'New Product Added'
        ]));

        return $product;
    }

    public function shareProduct($id, $provider)
    {
        $product = $this->getSingleProduct($id);
        $this->share_service->storeShare($product->id, 'product');
        if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() == 'user.offer.get') {
            $link = route('user.offer.get', $product->id);
        } else {
            $link = route('user.product.get', $product->id);
        }

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }
        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . $product->name_en;
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $product->name_en;
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }

    public function validateProductImages($product)
    {
        $count_product_images = $product->images->count();
        $count_added_images = count((array) request('images'));
        $all_images_count = $count_product_images + $count_added_images;
        return $all_images_count > 5 ? false : true;
    }

    public function updateProduct($id, $showroom_id)
    {
        $product = $this->getSingleProductShowroom($id, $showroom_id);

        if (!$this->validateProductImages($product)) {
            return false;
        }

        if (isset($this->request->has_offer)) {
            $offer_service = new OfferService;
            if ($product->offer) {
                $offer_service->updateOffer($product->id);
            } else {
                $offer_service->storeOffer($product->id, $showroom_id);
            }
        }

        $product->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'description_en' => $this->request->description_en,
            'description_ar' => $this->request->description_ar,
            'height' => $this->request->height,
            'width' => $this->request->width,
            'depth' => $this->request->depth,
            'color_id' => $this->request->color_id,
            'material_id' => $this->request->material_id,
            'country_id' => $this->request->country_id,
            'upholstery_id' => $this->request->upholstery_id,
            'price' => $this->request->price,
            'guarantee' => $this->request->guarantee,
            'others' => $this->request->others ? $this->request->others : null,
            'style_id' => $this->request->style_id,
            'hidden_price' => $this->request->hidden_price ? 1 : 0,
        ]);

        $product_image_service = new ProductImageService;

        if (count((array) $this->request->images) > 0) {
            foreach ($this->request->images as $image) {
                $product_image_service->addImage($image, $product->id);
            }
        }

        $product->categories()->sync($this->request->categories);

        $product->branches()->sync($this->request->branches);

        return true;
    }

    public function filterProduct()
    {
        $products = $this->product_model->newQuery();

        if (
            request()->ajax() &&
            (request('keyword') || request('max_price') || request('style_id')
                || request('category_id') || request('max_height') || request('max_width')
                || request('max_depth') || request('color_id'))
        ) {
            if (request('keyword')) {
                $keyword = request('keyword');
                $products->where(function ($query) use ($keyword) {
                    $query->where('name_en', 'LIKE', '%' . $keyword . '%')->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
                });
            }

            if (request('max_price')) {
                $max_price = request('max_price');
                $products->where('price', '<', $max_price);
            }

            if (request('max_height')) {
                $max_height = request('max_height');
                $products->where('height', '<', $max_height);
            }

            if (request('max_width')) {
                $max_width = request('max_width');
                $products->where('width', '<', $max_width);
            }

            if (request('max_depth')) {
                $max_depth = request('max_depth');
                $products->where('depth', '<', $max_depth);
            }

            if (request('style_id')) {
                $style_id = request('style_id');
                $products->where('style_id', $style_id);
            }

            if (request('color_id')) {
                $color_id = request('color_id');
                $products->where('color_id', $color_id);
            }

            if (request('category_id')) {
                $category_id = request('category_id');
                $products->whereHas('categories', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                });
            }

            return $products->png()->approve()->latest()->with(['images'])->get();
        }

        return $products->png()->approve()->latest()->with(['images'])->take(12)->get();
    }

    public function deleteOffer($product_id)
    {
        $product = $this->getSingleProduct($product_id);
        $product->offer->delete();
    }

    public function SendRequestMsg(&$user, &$product){
        $message   = new Showroom_Messages;
        $message->message_body = " i ask Price for Product ". $product->name_ar;
        $message->mesage_subject = 'no subject';
        $message->showroom_id = $product->showroom_id;
        $message->user_id = $user->id;
        $message->save();
        $showroom = $product->showroom;
        $showroomUser = $showroom->user;
        $sender = $user;

        $showroomUser->notify(new SendNotification([
            'type' => \App\Showroom::class,
            'typeId' => $showroom->id,
            'url' => route('user.my.dashboardChat', ['id' => $showroom->id]),
            'text' => "$sender->first_name Send You Request Price in $showroom->name_en"
        ]));
    }
    public function askRequest(&$request){
        $product   = $this->product_model->with("showroom")->findOrFail($request->product_id);
        $user      = auth("user")->user();
        $this->SendRequestMsg($user, $product);
       
    }

    public function deleteProduct($product_id)
    {
        $product = $this->getSingleProduct($product_id);
        $product->delete();
    }

    public function storeProductInSession($id)
    {
        if ($this->request->session()->has('products')) {
            $products_ids = json_decode($this->request->session()->get('products'));

            // if (!in_array($id, $products_ids)) {
            array_push($products_ids, $id);
            // }
            $this->request->session()->put('products', json_encode($products_ids));
        } else {
            $products_ids = array();
            array_push($products_ids, $id);
            $this->request->session()->put('products', json_encode($products_ids));
        }
    }

    public function removeProductFromSession($id)
    {
        if ($this->request->session()->has('products')) {
            $products_ids = json_decode($this->request->session()->get('products'));

            if (($key = array_search($id, $products_ids)) !== false) {
                unset($products_ids[$key]);
            }

            $this->request->session()->put('products', json_encode($products_ids));
        }
    }

    public function getUsersProducts()
    {
        $products_ids = json_decode($this->request->session()->get('products'));
        return $this->product_model->whereIn('id', $products_ids)->get();
    }

    public function clearProductsSession()
    {
        $this->request->session()->forget('products');

        foreach (Storage::disk('temps')->files() as $filename) {
            if (strpos($filename, '_' . auth()->guard('user')->user()->id . '.jpg') !== false) {
                Storage::disk('temps')->delete($filename);
            }
        }
    }

    public function getProductsRecentByShowrooms($paginate)
    {
        // $products = [];
        // $showroomIds = Showroom::has('products')->latest()->paginate($paginate);

        // $loadMore = $showroomIds->hasMorePages();
        // $showroomIds = $showroomIds->pluck('id');

        // foreach ($showroomIds as $showroom_id) {

        //     $showroomProducts = $this->product_model->newQuery();

        //     $showroomProducts = $showroomProducts->approve()->latest()->where('showroom_id', $showroom_id)
        //         ->with('comments', 'saves', 'likes', 'showroom', 'images', 'categories', 'reviews')->paginate(1);

        //     count($showroomProducts) > 0 ? $products = array_merge($products, $showroomProducts->items()) : '';
        // }
        $products = $this->product_model->approve()->latest()
            ->with('comments', 'saves', 'likes', 'showroom', 'images', 'categories', 'reviews')->paginate($paginate);
        $loadMore = $products->hasMorePages();
        return ['products' => $products, 'load_more' => $loadMore];
    }

    public function getHomeProducts($paginate = 16)
    {
        return cache()->remember(CacheKeyTrait::getProductsHomeKey($paginate), env('SHORT_TIME_CACHE'), function () use ($paginate) {
            $productsData = $this->getProductsRecentByShowrooms($paginate);
            return $productsData;
        });
    }
}
