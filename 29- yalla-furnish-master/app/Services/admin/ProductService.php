<?php


namespace App\Services\admin;

use Illuminate\Http\Request;

use App\Product;
use App\Services\admin\ProductImageService;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendNotification;

/**
 * Class IdeaService
 * @package App\Services\admin
 */
class ProductService
{
    /**
     * @var Product
     */
    private $model;
    private $request;
    /**
     * ProductService constructor.
     * @param Product $model
     */
    public function __construct(Product $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function getAllProducts()
    {
        $products = $this->model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $products->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            })->orWhere(function ($query) use ($keyword) {
                $query->where('description_en', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('description_ar', 'LIKE', '%' . $keyword . '%');
            });
        }

        $products = $products->latest()->paginate(15);

        return $products;
    }

    public function getProduct(int $id)
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    public function storeProduct()
    {
        $product = $this->model->create([
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
            'showroom_id' => $this->request->showroom_id,
            'approve' => 1
        ]);

        $product_image_service = new ProductImageService;

        foreach ($this->request->images as $image) {
            $product_image_service->addImage($image, $product->id);
        }

        $product->categories()->attach($this->request->categories);

        $product->branches()->attach($this->request->branches);
    }

    public function approveProduct($id)
    {
        $product = $this->getProduct($id);
        $product->update(['approve' => 1]);

        $product->load(["showroom.user", "showroom.followers"]);
        Notification::send($product->showroom->user, new SendNotification([
            'type' => \App\Product::class,
            'typeId' => $product->id,
            'url' => route('user.product.get', $product->id),
            'text' => "Admin Approve Your Product : $product->name_en"
        ]));
        if (!$product->reason) {
            $link = route('user.product.get', $product->id);
            $text = "{$product->showroom->name_en} add Product : $product->name_en";

            if ($product->offer) {
                $link = route('user.offer.get', $product->id);
                $text = "{$product->showroom->name_en} add Offer : $product->name_en";
            }

            // send for follower
            Notification::send($product->showroom->followers, new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => $link,
                'text' => $text,
            ]));
        }
    }

    public function dismissProduct($id, $reason)
    {
        $product = $this->getProduct($id);
        $product->update(['approve' => 0, 'reason' => $reason]);

        Notification::send($product->showroom->user, new SendNotification([
            'type' => \App\Product::class,
            'typeId' => $product->id,
            'url' => route('user.product.get', $product->id),
            'text' => "Admin Dismiss Your Product : $product->name_en with Reason : $reason"
        ]));
    }

    public function validateProductImages($product)
    {
        $count_product_images = $product->images->count();
        $count_added_images = count((array) request('images'));;
        $all_images_count = $count_product_images + $count_added_images;
        return $all_images_count > 5 ? false : true;
    }

    public function updateProduct($id)
    {
        $product = $this->getProduct($id);

        if (!$this->validateProductImages($product)) {
            return false;
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
            'showroom_id' => $this->request->showroom_id
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

    public function deleteProduct($id)
    {
        $product = $this->getProduct($id);

        $product->delete();
    }

    public function getProductsCount()
    {
        return $this->model->count();
    }
}
