<?php

namespace App\Http\Controllers\user;

use App\Activity;
use App\Branch;
use App\Category;
use App\City;
use App\Color;
use App\Districtes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\StoreShowroomRequest;
use App\Http\Requests\UpdateShowroomRequest;
use App\Http\Requests\ChatUnreadRequest;
use App\Idea;
use App\Message_Images;
use App\Offer;
use App\Product;
use App\Services\site\BranchService;
use App\Services\site\OfferService;
use App\Services\site\ShowroomService;
use App\Showroom;
use App\ShowroomReview;
use App\Showroom_Follower;
use App\Showroom_Messages;
use App\Style;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\ChatFollow;
use App\Services\site\CityService;
use App\Services\site\StyleService;
use App\Http\Requests\ChatModifyRequest;
use App\Http\Requests\storeReviewRequest;
use App\Http\Requests\UpdateSlugRequest;
use App\Notifications\SendNotification;
use App\Services\site\CategoryService;
use App\Services\site\MallService;
use App\Services\site\ProductService;
use App\Services\site\ShowroomFollowerService;
use App\Services\site\ShowroomReviewService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


class ShowroomController extends Controller
{
    protected $request;
    protected $showroom_model;
    protected $offer_service;
    protected $showroomService;

    public function __construct(Request $request, OfferService $offer_service, ShowroomService $showroomService, Showroom $showroom_model)
    {
        $this->request = $request;
        $this->offer_service = $offer_service;
        $this->showroomService = $showroomService;
        $this->showroom_model = $showroom_model;
    }
    // get all showrooms and filtring it by keyword - districtes - styles
    public function index(StyleService $styleService, CityService $cityService, ShowroomService $showroom_service, MallService $mall_service)
    {
        $styles = $styleService->getAll();
        $cities = $cityService->getCities();

        if ($this->request->ajax() && $this->request->malls) {
            $malls = $mall_service->getAllMalls();
            return view('frontend.malls.malls_data', compact('malls'))->render();
        }

        $showrooms = $showroom_service->getShowrooms($perPage = 40);

        if ($this->request->ajax()) {
            return view('frontend.showrooms.showrooms_data', compact('showrooms'));
        }
        return view('frontend.showrooms.showrooms', compact(['showrooms', 'styles', 'cities']));
    }

    // get single showroom detailes
    public function SingleShowroom($slug, ProductService $productService, ShowroomReviewService $showroomReviewService, ShowroomService $showroomService)
    {
        $branch = '';
        $branch = request()->var;
        $showroom = $showroomService->getSingleShowroomBy(['slug' => $slug]);

        // handle ajax requests
        if (request()->ajax()) {
            $tab = request()->tab;
            if ($tab === 'products') {
                $products = $productService->getShowroomProducts($showroom->id);
                return view('frontend.products.products_data', compact('products', 'branch'))->render();
            } elseif ($tab === 'offers') {
                $offers = $this->offer_service->getOffersByShowroom($showroom->id);
                return view('frontend.showrooms.showroomTabs.showroomOffer', compact('offers', 'branch'))->render();
            } elseif ($tab === 'info') {
                return view('frontend.showrooms.showroomTabs.showroomInfo', compact('branch', 'showroom'))->render();
            } elseif ($tab === 'reviews') {
                $showroom_reviews = $showroomReviewService->getShowroomReviews($showroom->id, $perPage = 5);
                return view('frontend.showrooms.showroomTabs.showroomReview', compact('showroom_reviews', 'branch', 'showroom'))->render();
            }
        } else { // handle web requests
            $categories = $showroom->categories;
            if ($tab = request()->tab) {
                if ($tab === 'products') {
                    $products = $productService->getShowroomProducts($showroom->id);
                    return view('frontend.showrooms.showroom_details', compact('branch', 'showroom', 'products', 'categories'));
                } elseif ($tab === 'offers') {
                    $offers = $this->offer_service->getOffersByShowroom($showroom->id);
                    return view('frontend.showrooms.showroom_details', compact('offers', 'categories', 'showroom'));
                } elseif ($tab === 'info') {
                    return view('frontend.showrooms.showroom_details', compact('categories', 'showroom'));
                } elseif ($tab === 'reviews') {
                    $showroom_reviews = $showroomReviewService->getShowroomReviews($showroom->id, $perPage = 5);
                    return view('frontend.showrooms.showroom_details', compact('showroom_reviews', 'categories', 'showroom'));
                }
            } else {
                $products = $productService->getShowroomProducts($showroom->id);
                return view('frontend.showrooms.showroom_details', compact('branch', 'showroom', 'products', 'categories'));
            }
        }
    }

    // follow and unfollow showrooms
    public function followShowroom(ShowroomFollowerService $showroomFollowerService)
    {
        $showroom = $this->showroomService->getSingleShowroomBy(['id' => $this->request->showroom_id]);
        if ($showroom->user_id == auth('user')->user()->id) {
            abort(403);
        }
        $follow = $showroomFollowerService->followShowroom($showroom, auth('user')->user()->id);
        return $follow[1];
    }

    // send message to showroom
    public function send_message()
    {
        return view('frontend.showrooms.message_form');
    }
    //  deleteChat of showroom
    public function deleteChat(ChatModifyRequest $ValidRequest)
    {
        $ChatIDs =  Showroom_Messages::where('showroom_id', $ValidRequest->showroom_id)->where('user_id', $ValidRequest->user_id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Chat Deleted Success'
        ]);
    }
    //  unreadChat of showroom
    public function unreadChat(ChatUnreadRequest $ValidRequest)
    {
        $message =  Showroom_Messages::where([
            'user_id' => request('user_id'),
            'showroom_id' => request('showroom_id'),
            'reply' => request('type'),
        ])->latest()->first();
        // return response()->json($message);
        $message->update(['read' => 0]);
        // $ChatIDs =  Showroom_Messages::where('showroom_id', $ValidRequest->showroom_id)
        //     ->where('user_id', $ValidRequest->user_id)
        //     ->each(function ($chat, $key) {
        //         $chat->update([
        //             'read' => 0,
        //         ]);
        //     }); 
        return response()->json([
            'code' => 200,
            'message' => 'Chat Changed to Unread'
        ]);
    }
    // pinChat of showroom
    public function pinChat(ChatModifyRequest $ValidRequest)
    {
        $follow = $ValidRequest->action ===  "pin"  ? 1 : 0;
        $chatPin =  Showroom_Messages::where('showroom_id', $ValidRequest->showroom_id)
            ->where('user_id', $ValidRequest->user_id)
            ->each(function ($chat, $key) use ($follow) {
                $chat->update([
                    'follow' => $follow
                ]);
            });
        return response()->json([
            'code' => 200,
            'message' => 'Chat Pinned'
        ]);
    }
    // public function blockChat(ChatModifyRequest $ValidRequest)
    // {
    //     $chatBlock =  Showroom_Messages::where('showroom_id', $ValidRequest->showroom_id)
    //         ->where('user_id', $ValidRequest->user_id)
    //         ->each(function ($chat, $key) {
    //             $chat->update([
    //                 'block' => 1
    //             ]);
    //         });
    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'Chat blocked'
    //     ]);
    // }

    //store message to showroom
    public function stroe_message()
    {
        $this->checkCommentBody();
        $this->validate($this->request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000|required_without_all:body',
            'body' => 'max:1000|required_without_all:image'
        ]);
        $message = new Showroom_Messages;

        DB::beginTransaction();
        try {
            $message->message_body = request()->body;
            $message->mesage_subject = 'no subject';
            $message->showroom_id = request()->showroom_id;
            $message->user_id = auth()->guard('user')->user()->id;
            $message->save();
            $msg_id = $message->id;
            if ($this->request->hasFile('image')) {
                $imageName = time() . 'image' . uniqid() . '.' . $this->request->image->getClientOriginalExtension();
                Storage::disk('s3')->put('messages/' . $imageName, file_get_contents($this->request->image), 'public');
                $msg_img = new Message_Images;
                $msg_img->image = $imageName;
                $msg_img->msg_id = $msg_id;
                $msg_img->save();
            }
            $showroom = $message->showroom;
            $showroomUser = $showroom->user;
            $sender = $message->user;

            $showroomUser->notify(new SendNotification([
                'type' => \App\Showroom::class,
                'typeId' => $showroom->id,
                'url' => route('user.my.dashboardChat', ['id' => $showroom->id]),
                'text' => "$sender->first_name Send You a Message in $showroom->name_en"
            ]));
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
        }
        if (request()->ajax()) {
            return response()->json(['message' => 'Message Sent Successfully', 'code' => 200]);
        }
        return back();
    }

    public function stripCommentBody()
    {
        //  find multi space - br and br in end of string
        $find = ['/\s*&nbsp;(?:\s*&nbsp;)*\s*/', '/\s+/', '/(?:\s*<br[^>]*>\s*){3,}/s', '/(<br>)+$/'];
        //  replace  multi space - br and br in end of string
        $replace  = ['', '&nbsp;', '', "<br>", ''];
        //  apply regex on body with br tag only 
        $body = str_replace('<p><br></p>', '<br>', preg_replace($find,   $replace, strip_tags(request()->body, '<br>')));
        //  merge body with adding p tag 
        request()->merge(['body' => "<p>"  . $body  . "</p>"]);
    }

    public function checkCommentBody()
    {
        $this->stripCommentBody();
        if (strip_tags(trim(str_replace("&nbsp;", "",   request()->body)))  === '' && !request()->has('image')) {
            throw ValidationException::withMessages(['body' => "Message Can't be Empty"]);
        }
    }

    // get all message for single showroom
    public function getMessages()
    {
        $messages = Showroom_Messages::all();
        return view('messages', compact('messages'));
    }
    // get create showroom
    public function create(Style $style_model, Districtes $district_model, City $city_model, Category $category_model)
    {
        $cities = $city_model->orderBy('name_en', 'asc')->get();
        $styles = $style_model->get();
        $categories = $category_model->get();

        return view('frontend.showrooms.create', compact('cities', 'styles', 'categories'));
    }

    public function store(StoreShowroomRequest $request, ShowroomService $showroom_service)
    {
        try {
            DB::beginTransaction();
            $showroom = $showroom_service->storeShowroom(auth('user')->user()->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['code' => 200, 'message' => 'Showroom Created Successfully', 'showroom_id' => $showroom->id]);
    }

    public function store_review(storeReviewRequest $request, ShowroomReviewService $showroomReviewService)
    {
        $showroomReviewService->storeReview(auth('user')->user()->id);
        return redirect()->back()->with('review', 'review');
    }

    public function edit_review(Request $request)
    {
        $showroom_review =  ShowroomReview::where(['id' => $request->id_review, 'user_id' => auth('user')->user()->id])->firstOrFail();

        $services = $request->services;
        if (array_search('services', $services, true) !== false) {
            $showroom_review->services = 1;
        } else {
            $showroom_review->services = null;
        }
        if (array_search('sales', $services, true) !== false) {
            $showroom_review->sales = 1;
        } else {
            $showroom_review->sales = null;
        }
        if (array_search('prices', $services, true) !== false) {
            $showroom_review->prices = 1;
        } else {
            $showroom_review->prices = null;
        }
        if (array_search('qualities', $services, true) !== false) {
            $showroom_review->qualities = 1;
        } else {
            $showroom_review->qualities = null;
        }
        if (array_search('others', $services, true) !== false) {
            $showroom_review->others = 1;
        } else {
            $showroom_review->others  = null;
        }
        $showroom_review->review = $request->review;
        $showroom_review->rate = $request->rate;

        $showroom_review->showroom_id = $request->id;
        if (auth()->guard('user')->check()) {
            $showroom_review->user_id = auth()->guard('user')->id();
        }
        $showroom_review->save();
        return redirect()->back()->with('msg', 'Done Update');
    }


    public function delete_review(Request $request)
    {
        $showroom_review =  ShowroomReview::findOrFail($request->id);
        $showroom_review->forceDelete();
        return redirect()->back()->with('msg', 'Done Deleted');
    }

    public function advancedSearch(StyleService $styleService, CategoryService $categoryService, CityService $cityService)
    {
        $keyword = $this->request->keyword;
        $categories = $categoryService->getAll();
        $styles = $styleService->getAll();
        $cities =  $cityService->getCities();
        $showrooms = $this->showroomService->getShowrooms($perPage = 20);
        if ($this->request->ajax()) {
            return view('frontend.showrooms.advanced_showrooms_data', compact('showrooms'));
        } else {
            return view('frontend.search_layouts.advanced_search_showrooms', compact('categories', 'keyword', 'showrooms', 'styles', 'cities'));
        }
    }

    //  get Dashboard Main
    public function getDashboardChat($id, $message_user_id = null, $read = null)
    {
        if (!is_null($message_user_id) && $message_user_id !== "null" && $user =  User::findOrFail($message_user_id)->isBlocked($id)) {

            return redirect()->back();
        }
        $user_id = auth()->guard('user')->user()->id; // owner_id
        $showroom = $this->showroom_model->active()->with('offers')->findOrFail($id); //showroom  

        if ($user_id == $showroom->user_id) {

            $showrooms = $this->showroom_model->where('user_id', $user_id)->approve()->active()->get();
            $all_messages = '';
            $Showroom_Messages = '';
            $MessagesUsers = '';
            if ($search = request()->search) {
                $user_messages = Showroom_Messages::where('showroom_id', $id)
                    ->whereHas('user', function ($query) use ($search) {
                        $query->where('first_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%');
                    })->get();
                if ($message_user_id !== null) {
                    $Showroom_Messages = Showroom_Messages::where('user_id', $message_user_id)
                        ->where('showroom_id', $id)
                        ->with('user')
                        ->with('images')
                        ->get();
                }
            } else {

                if ($read == null || $read == 'All') {
                    $user_messages = Showroom_Messages::where('showroom_id', $id)
                        ->with('user')
                        ->get();
                    $Showroom_Messages = Showroom_Messages::where('user_id', $message_user_id)
                        ->where('showroom_id', $id)
                        ->with('user')
                        ->with('images')
                        ->get();
                } elseif ($read == 'Read') {

                    $uesr_message = Showroom_Messages::where('showroom_id', $id)
                        ->where('read', 0)->with('user')
                        ->get();
                    $user_ids = [];
                    foreach ($uesr_message as $value) {
                        $user_ids[] = $value->user->id;
                    }
                    $user_messages = Showroom_Messages::where('showroom_id', $id)
                        ->whereNotIn('user_id', $user_ids)
                        ->where('read', 1)->with('user')
                        ->get();
                    $Showroom_Messages = Showroom_Messages::where('user_id', $message_user_id)
                        ->where('showroom_id', $id)
                        ->where('read', 1)
                        ->with('user')
                        ->with('images')
                        ->get();
                } elseif ($read == 'UnRead') {
                    $user_messages = Showroom_Messages::where('showroom_id', $id)
                        ->where('read', 0)->with('user')
                        ->get();
                    $Showroom_Messages = Showroom_Messages::where('user_id', $message_user_id)
                        ->where('showroom_id', $id)
                        ->where('read', 0)
                        ->with('user')
                        ->with('images')
                        ->get();
                } elseif ($read == 'Pinned') {
                    $pinned_user_ids = ChatFollow::where([
                        'user_id' => CurrentUser()->id,
                        'pinnable_type' => "App\User",
                    ])->get()->pluck('pinnable_id');
                    // $user_messages = Showroom_Messages::where('showroom_id', $id)
                    //   
                    //     ->with('user') 
                    //     ->get();
                    $Showroom_Messages = Showroom_Messages::where('user_id', $message_user_id)
                        ->where('showroom_id', $id)
                        ->with('user')
                        ->with('images')
                        ->get();
                }
            }
            $ids = [];
            if (isset($pinned_user_ids) &&  count($pinned_user_ids) > 0) {
                foreach ($pinned_user_ids as $id) {
                    $ids[] = $id;
                }
                $MessagesUsers = User::whereIn('id', $ids)->get();
                if ($message_user_id == null) {
                    $message_user_id = 0;
                }
            }

            if (isset($user_messages) && count($user_messages) > 0) {

                foreach ($user_messages as $value) {
                    if ($value->user->nonBlocked($id)) {
                        $ids[] = $value->user->id;
                    }
                }
                $MessagesUsers = User::whereIn('id', $ids)->get();
                if ($message_user_id == null) {
                    $message_user_id = 0;
                }
            }
            $read = Showroom_Messages::where('user_id', $message_user_id)
                ->where('showroom_id', $id)
                ->update(['read' => 1]);
            $all_messages = Showroom_Messages::where('showroom_id', $id)->get();
        }
        return view(
            'frontend.showrooms.dashboardTabs.dashboardChat',
            compact('showroom', 'all_messages', 'MessagesUsers', 'Showroom_Messages', 'message_user_id', 'showrooms')
        );
    }
    // dashboad information 
    public function getDashboardInfo($id)
    {
        $user_id = auth()->guard('user')->user()->id;
        $showroom = Showroom::active()->with('offers')->findOrFail($id); // showroom
        if ($user_id == $showroom->user_id) {
            $showrooms = $this->showroom_model->where('user_id', $user_id)->get(); // showrooms
            $styles = Style::get();
            $categories = Category::get();
            $cities = City::all();
            $districts = Districtes::orderBy('name_en', 'asc')->get();
            return view('frontend.showrooms.dashboardTabs.dashboardInformation', compact('showroom', 'styles', 'categories', 'cities', 'districts', 'showrooms'));
        }
    }
    // dashboad offers 
    public function getDashboardOffers($id)
    {
        $showroom = $this->showroom_model->active()->with('offers')->findOrFail($id); // showroom 
        $user_id = auth()->guard('user')->user()->id;
        $showrooms = $this->showroom_model->where('user_id', $user_id)->get(); // showrooms 
        return view('frontend.showrooms.dashboardTabs.dashboardOffers', compact('showroom',  'showrooms', 'user_id'));
    }
    // dashboad Product 
    public function getDashboardProducts($id)
    {
        $showroom = $this->showroom_model->active()->with('offers')->findOrFail($id); // showroom 
        $user_id = auth()->guard('user')->user()->id;
        if ($user_id == $showroom->user_id) {
            $showrooms = $this->showroom_model->where('user_id', $user_id)->get(); // showrooms  
        }
        return view('frontend.showrooms.dashboardTabs.dashboardProducts', compact('showroom', 'showrooms', 'user_id'));
    }

    public function suspend_showroom($showroom_id)
    {
        $user_id = auth()->guard('user')->user()->id;
        $showrooms = $this->showroom_model->where('id', $showroom_id)->where('user_id', $user_id)->get();
        if (count($showrooms) > 0) {
            $showroom = $this->showroom_model->find($showroom_id);
            $showroom->active = 0;
            $showroom->save();
            // echo "ok";
            return redirect()->back()->with('suspend', 'suspend');
        } else {
            // echo "no";
            return redirect()->back()->with('failed_suspend', 'failed_suspend');
        }
    }
    public function edit_showroom($id, Style $style, Districtes $district, User $user, Category $category_model)
    {
        $showroom = $this->showroom_model->active()->find($id);
        $styles = $style->all();
        $categories = $category_model->get();

        $districts = $district->orderBy('name_en', 'asc')->all();
        $users = $user->all();
        return view('admin.pages.showrooms.update_showroom', compact(['showroom', 'categories', 'styles', 'districts', 'users']));
    }

    public function update_showroom($id, UpdateShowroomRequest $request, ShowroomService $showroom_service)
    {
        $showroom_service->updateShowroom($id);
        return redirect()->back()->with(['message' => 'Showroom Updated Successfully']);
    }

    public function reply_message()
    {
        $validator = Validator::make($this->request->all(), [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000|required_without_all:body',
            'body' => 'max:1000|required_without_all:image',
        ]);
        $this->checkCommentBody();
        $message = new Showroom_Messages;

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
            try {
                $message->message_body = request()->body;
                $message->mesage_subject = 'subject';
                $message->showroom_id = request()->showroom_id;
                $message->reply = 1;
                $message->user_id = request()->user_id;
                $message->save();
                $msg_id = $message->id;

                if (request()->hasFile('image')) {
                    foreach (request()->image as $image) {
                        $imageName = time() . 'image' . uniqid() . '.' . $image->getClientOriginalExtension();
                        Storage::disk('s3')->put('messages/' . $imageName, file_get_contents($image));
                        $msg_img = new Message_Images;
                        $msg_img->image = $imageName;
                        $msg_img->msg_id = $msg_id;
                        $msg_img->save();
                    }
                }
                $showroom = $message->showroom;
                $showroomUser = $showroom->user;
                $receiver = $message->user;

                $receiver->notify(new SendNotification([
                    'type' => \App\Showroom::class,
                    'typeId' => $showroom->id,
                    'url' => route('user.my.messages', ['showroom_id' => $showroom->id]),
                    'text' => "$showroom->name_en Send You a Message."
                ]));

                DB::commit();
                return back()->with(['success' => 'success']);
            } catch (\Exception $e) {
                throw $e;
                DB::rollback();
            }
        }
    }
    public function storeBranch($id, storeBranchRequest $request, ShowroomService $showroom_service, BranchService $branch_Service)
    {
        $branch_Service->storeNewBranch($id);
        return response()->json([
            'code' => 200,
            'message' => 'Branch Added Successfully'
        ]);
    }
    public function updateBranch($id, storeBranchRequest $request, BranchService $branch_Service)
    {
        $branch_Service->updateBranch($id);
        return response()->json(['code' => 200, 'message' => 'Branch Updated Successfully']);
    }
    public function DeleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->info()->delete();
        $branch->delete();
        return redirect()->back()->withMessage('branch deleted successfully');
    }
    public function addInfo(Request $request)
    {
        try {
            $flag = Showroom::where('id', $request->showroom_id)
                ->update([
                    'phone' => $request->phone,
                    'contact_email' => $request->email,
                ]);

            if ($flag) {
                return response()->json(['success' => 'success']);
            } else {
                return response()->json(['error' => 'error']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    public function updateSlug($id, UpdateSlugRequest $request, ShowroomService $showroom_service)
    {
        try {
            $showroom_service->updateSlug($id);
            return back()->withMessage('Your Request Sent Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
