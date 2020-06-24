<?php

namespace App\Services\site;

use App\MessageReply;
use App\MessageReplyImages;
use App\Services\site\BranchService;
use App\Showroom;
use App\Districtes;
use App\Traits\CacheKeyTrait;
use App\Mail\SlugRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendNotification;

class ShowroomService
{
    use CacheKeyTrait;

    private $showroom_model;
    private $request;

    public function __construct(Showroom $showroom_model, Request $request)
    {
        $this->showroom_model = $showroom_model;
        $this->request = $request;
    }

    public function getShowrooms($paginate = 40)
    {
        return cache()->remember(CacheKeyTrait::getShowroomsKey($paginate), env('SHORT_TIME_CACHE'), function () use ($paginate) {
            $showrooms = $this->showroom_model->newQuery();

            if (isset($this->request->keyword)) {
                $keyword = $this->request->keyword;
                $arr = explode(" ", $keyword);

                for ($i = 0; $i < count($arr); $i++) {
                    $showrooms->where(function ($query1) use ($arr, $i) {
                        $query1->where(function ($query) use ($arr, $i) {
                            $query->where('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_en', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('categories', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('styles', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                        })->orWhereHas('district', function ($query) use ($arr, $i) {
                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhereHas('city', function ($query) use ($arr, $i) {
                                    $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                        ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                                });
                        })->orWhereHas('products', function ($query) use ($arr, $i) {
                            $query->where(function ($query) use ($arr, $i) {
                                $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                            });
                        });
                    });
                }
            }

            if (isset($this->request->style)) {
                $style_id = $this->request->style;
                $showrooms->whereHas('styles', function ($query) use ($style_id) {
                    $query->where('style_id', $style_id);
                });
            }

            if (isset($this->request->category)) {
                $category_id = $this->request->category;
                $showrooms->whereHas('categories', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                });
            }

            if (isset($this->request->city) && !isset($this->request->district)) {
                $ids = [];

                $districts = Districtes::where('city_id', $this->request->city)->get();
                foreach ($districts as $district) {
                    $ids[] = $district->id;
                }
                $showrooms->whereIn('district_id', $ids);
            }

            if (isset($this->request->district)) {
                $showrooms->where('district_id', $this->request->district);
            }

            $showrooms = $showrooms->active()->approve()->with(['branches', 'followers', 'reviews'])->paginate($paginate);

            return $showrooms;
        });
    }

    public function storeShowroom($userId)
    {
        $showroom = $this->showroom_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'about' => $this->request->about,
            'yt' => $this->request->youtube,
            'fb' => $this->request->facebook,
            'website' => $this->request->website,
            'instgram' => $this->request->instgram,
            'tw' => $this->request->twitter,
            'showroom_image' => $this->request->showroom_image,
            'showroom_coverImage' => $this->request->background_image,
            'district_id' => $this->request->district_id,
            'user_id' => $userId,
            'active' => 0,
            'slug' => $this->request->slug,
            'contact_email' => $this->request->contact_email,
            'contact_name' => $this->request->contact_name,
            'phone' => $this->request->phone
        ]);

        $showroom->styles()->attach($this->request->styles);
        $showroom->categories()->attach($this->request->categories);

        $branch_service = new BranchService;
        $branch_service->storeNewBranch($showroom->id);

        Notification::send(getAdmins(), new SendNotification([
            'type' => \App\Showroom::class,
            'typeId' => $showroom->id,
            'url' => route('admin.showroom.details', $showroom->id),
            'text' => 'New Showroom Added'
        ]));

        return $showroom;
    }

    public function getSingleShowroomBy($attributes = [])
    {
        $showroom = $this->showroom_model->newQuery();

        foreach ($attributes as $column => $value) {
            $showroom->where($column, $value);
        }

        return $showroom->active()->approve()->with(['branches', 'followers', 'categories'])->firstOrFail();
    }

    public function getUserShowroom($id, $userId)
    {
        return $this->showroom_model->where([
            'id' => $id,
            'user_id' => $userId,
        ])->approve()->firstOrFail();
    }

    public function updateShowroom($id)
    {
        $showroom = $this->getSingleShowroomBy(['id' => $id]);
        $showroom->name_ar = $this->request->name_ar;
        $showroom->name_en = $this->request->name_en;
        $showroom->yt = $this->request->youtube;
        $showroom->tw = $this->request->twitter;
        $showroom->website = $this->request->website;
        $showroom->fb = $this->request->facebook;
        $showroom->instgram = $this->request->instgram;
        $showroom->about = $this->request->about;

        if (isset($this->request->district_id)) {
            $showroom->district_id = $this->request->district_id;
        }

        if (isset($this->request->categories) && count($this->request->categories) > 0) {
            $showroom->categories()->sync($this->request->categories);
        }

        if (isset($this->request->styles) && count($this->request->styles) > 0) {
            $showroom->styles()->sync($this->request->styles);
        }

        // imaged not upload Hint --------------->
        $showroom->showroom_image = $this->request->showroom_image;
        $showroom->showroom_coverImage = $this->request->showroom_coverImage;
        $showroom->update();
    }

    public function replyMessage()
    {
        $validator = Validator::make(request()->all(), [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000|required_without_all:body',
            'body' => 'max:1000|required_without_all:image',
        ]);
        $message = new MessageReply;

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();

            try {
                $message->message_body = request()->body;
                $message->showroom_id = request()->showroom_id;
                $message->user_id = auth()->guard('user')->user()->id;
                $message->reply_user_id = request()->reply_user_id;
                $message->save();
                $msg_id = $message->id;
                if (request()->hasFile('image')) {
                    for ($i = 0; $i < count(request()->image); $i++) {
                        $imageName = time() . 'image' . uniqid() . '.' . request()->image[$i]->getClientOriginalExtension();
                        Storage::disk('messages')->put($imageName, file_get_contents(request()->image[$i]));
                        $msg_img = new MessageReplyImages;
                        $msg_img->image = $imageName;
                        $msg_img->msg_id = $msg_id;
                        $msg_img->save();
                    }
                }
                DB::commit();
                return back()->with(['success' => 'success']);
            } catch (\Exception $e) {
                throw $e;
                DB::rollback();
                //return redirect('cc')->withErrors($validator)->withInput();
            }
        }
    }

    public function getUserShworooms($user_id)
    {
        return cache()->remember(CacheKeyTrait::getShowroomListKey($user_id), env('SHORT_TIME_CACHE'), function () use ($user_id) {
            return $this->showroom_model->approve()->active()->where('user_id', $user_id)->get();
        });
    }

    public function updateSlug($id)
    {
        $showroom = $this->getSingleShowroomBy(['id' => $id]);
        $subject = "Request To Change Slug";
        $slug = request('slug');
        Mail::to('info@yalla-furnish.com')->send(new SlugRequestMail($showroom, $subject, $slug));
    }
}
