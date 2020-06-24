<?php

namespace App\Http\Controllers\user;

use App\Activity;
use App\Category;
use App\City;
use App\Follow_Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Idea;
use App\Offer;
use App\Product;
use App\Services\site\ActivityService;
use App\Services\site\BackgroundService;
use App\Services\site\BoardService;
use App\Services\site\CategoryService;
use App\Services\site\CountryService;
use App\Services\site\ForgetPasswordService;
use App\Services\site\UpdatesService;
use App\Services\site\UserService;
use App\Showroom;
use App\Showroom_Follower;
use App\Showroom_Messages;
use App\Topic;
use App\User;
use App\UserUpdate;
use Illuminate\Http\Request;
use App\Services\site\CityService;
use App\Services\site\FollowService;
use App\Services\site\IdeaService;
use App\Services\site\OfferService;
use App\Services\site\ProductService;
use App\Services\site\TopicService;

class UserController extends Controller
{
    public function getIndex(ProductService $productService, IdeaService $ideaService, OfferService $offerService, CategoryService $categoryService)
    {
        $productsData = $productService->getHomeProducts();

        $ideas = $ideaService->getIdeas(2);
        $offers = $offerService->getOffers($perPage = 5);
        $categories = $categoryService->getAll();

        $products_ideas = array();

        foreach ($productsData['products'] as $key => $product) {
            $product->type = 'product';
            array_push($products_ideas, $product);

            if ($key == 6 && isset($ideas[0])) {
                $ideas[0]->type = 'idea';
                array_push($products_ideas, $ideas[0]);
            }

            if ($key == 13 && isset($ideas[1])) {
                $ideas[1]->type = 'idea';
                array_push($products_ideas, $ideas[1]);
            }
        }

        if (request()->ajax()) {
            return view('frontend.includes.home_products', compact('products_ideas'));
        }

        return view('frontend.users.index', compact('products_ideas', 'offers', 'categories'));
    }

    public function getRegister(CountryService $country_service, CityService $city_service)
    {
        $countries = $country_service->getAll();
        return view('frontend.users.auth.register', compact('countries'));
    }

    public function postRegister(UserRegisterRequest $request, UserService $user_service)
    {
        $user = $user_service->registerUser();

        auth()->guard('user')->login($user);

        return redirect()->route('user.my.profile')->with('regiser_success', 'regiser_success');
    }

    public function getLogin()
    {
        return view('frontend.users.auth.login');
    }

    public function postLogin(UserLoginRequest $request, UserService $user_service)
    {
        $user = $user_service->loginUser();
        if ($user) {
            return redirect()->route('user.index');
        }
        return back()->withErrors('Wrong Email or Password');
    }

    public function view_user_profile(
        $id,
        UserService $user_service,
        BoardService $board_service,
        TopicService $topicService,
        IdeaService $ideaService,
        ActivityService $activityService
    ) {
        if (auth()->guard('user')->check() && auth()->guard('user')->user()->id == $id) {
            return redirect()->route('user.my.profile');
        }

        $user = $user_service->view_user_profile($id);
        $ideas = $ideaService->getUserIdeas($id);
        $topics = $topicService->getUserTopics($id);
        $activities = $user->hidden == 0 ? $activityService->getUserActivities($id) : [];

        // get user boards
        $boards = $board_service->getAllPublicBoards($user->id);

        if (request()->ajax() && request('type') == 'boards') {
            return view('frontend.includes.boards_data', compact('boards', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'ideas') {
            return view('frontend.includes.ideas_data', compact('ideas', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'topics') {
            return view('frontend.includes.topics_data', compact('topics', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'activities') {
            return view('frontend.includes.activities_data', compact('activities', 'user'))->render();
        }

        return view('frontend.users.user_profile', compact(['user', 'ideas', 'topics', 'activities', 'boards']));
    }

    public function my_profile(
        UpdatesService $updates_service,
        UserService $user_service,
        CountryService $country_service,
        BoardService $board_service,
        ActivityService $activity_service,
        IdeaService $ideaService,
        TopicService $topicService
    ) {
        $countries = $country_service->getAll();
        $id = auth()->guard('user')->user()->id;
        $user = $user_service->view_user_profile($id);
        $cities = $user->country ? $user->country->cities : [];
        $my_followers = $user->followers;
        $my_followings = $user->followings;
        $ideas = $ideaService->getUserIdeas($id);
        $topics = $topicService->getUserTopics($id);
        $activities = $activity_service->getUserActivities($id);

        // get User Updates
        $updates = $updates_service->getUserUpdates($id);

        $following_showrooms = Showroom_Follower::where('user_id', $id)->with('showroom')->get();
        $showrooms_ids = Showroom_Follower::where('user_id', $id)->pluck('showroom_id');

        // get Showroom Updates 
        $showroom_updates = $updates_service->getShowroomUpdates($showrooms_ids);

        $boards = $board_service->getAllUserBoards($id);

        if (request()->ajax() && request('type') == 'boards') {
            return view('frontend.includes.boards_data', compact('boards', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'ideas') {
            return view('frontend.includes.ideas_data', compact('ideas', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'topics') {
            return view('frontend.includes.topics_data', compact('topics', 'user'))->render();
        } elseif (request()->ajax() && request('type') == 'updates') {
            return view('frontend.includes.updates_data', compact('showroom_updates', 'updates'))->render();
        } elseif (request()->ajax() && request('type') == 'activities') {
            return view('frontend.includes.activities_data', compact('activities', 'user'))->render();
        }

        return view('frontend.users.my_profile', compact(['following_showrooms', 'cities', 'my_followers', 'my_followings', 'user', 'countries', 'ideas', 'topics', 'activities', 'boards', 'updates', 'showroom_updates']));
    }

    public function Messages()
    {
        $messages = '';
        $showrooms = '';
        $id = auth()->guard('user')->user()->id;
        if (request()->has('showroom_id')) {
            if (Showroom::findOrFail(request('showroom_id'))->isBlocked()) {
                return redirect()->back();
            }
            $messages = Showroom_Messages::where('user_id', $id)
                ->where('showroom_id', request('showroom_id'))
                ->with('showroom')->get();
            $messages->each(function ($item) {
                $item->update(['read' => 1]);;
            });
        }
        $showrooms_ids_to_get = array();
        $showrooms_ids = Showroom_Messages::where('user_id', $id)
            ->pluck('showroom_id');

        foreach ($showrooms_ids as $showroomId) {
            $showroom = Showroom::find($showroomId);
            if ($showroom && $showroom->nonBlocked()) {
                array_push($showrooms_ids_to_get, $showroomId);
            }
        }

        $showrooms_messages = Showroom_Messages::where('user_id', $id)->get();
        $showrooms = Showroom::whereIn('id', $showrooms_ids_to_get)->get();
        return view('frontend.includes.user_messages', compact(['messages', 'showrooms', 'showrooms_messages']));
    }

    public function logout()
    {
        auth()->guard('user')->logout();
        return redirect()->route('user.index');
    }

    public function deleteActivity()
    {
        $id = request()->id;
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back()->with(['message' => 'activity deleted successfuly', 'open' => 'activity']);
    }
    public function follow_user(Request $request, UserService $user_service, FollowService $followService)
    {
        $following = $user_service->getSingleUser($request->user_id);
        if (auth('user')->user()->id == $following->id) {
            abort(403);
        }
        $follow = $followService->followUser($following, auth('user')->user()->id);
        return $follow[1];
    }

    public function editProfile(EditProfileRequest $request, UserService $user_service)
    {
        $user_service->updateProfile();

        return redirect()->route('user.my.profile')->with(['success' => 'success', 'open' => 'edit']);
    }

    public function getForgetPassword()
    {
        return view('frontend.users.auth.forgetpassword');
    }

    public function postForgetPassword(ForgetPasswordRequest $request, ForgetPasswordService $forget_service)
    {
        $user = $forget_service->getUserByEmail();

        if (!$user) {
            return back()->withErrors('Wrong Email');
        }

        $forget_service->storeForgetPassword($user);

        return back()->withMessage('Please Check Your Email To Continue.');
    }

    public function getNewPassword($token, ForgetPasswordService $forget_service)
    {
        $forget_service->checkForValidToken($token);
        return view('frontend.users.auth.newpassword');
    }

    public function postNewPassword($token, NewPasswordRequest $request, ForgetPasswordService $forget_service)
    {
        $forget_user = $forget_service->checkForValidToken($token);

        $forget_service->setNewPassword($forget_user);

        return redirect()->route('user.login.get')->withMessage('Login With Your New Password');
    }

    public function getAbout()
    {
        return view('frontend.users.about');
    }

    public function getTerms()
    {
        return view('frontend.users.terms');
    }

    public function getContact()
    {
        return view('frontend.users.contact');
    }

    public function postContact(ContactRequest $request, UserService $user_service)
    {
        $user_service->sendContactMail();

        return back()->withMessage('Message Sent Successfully');
    }

    public function getCountryCities(CountryService $country_service)
    {
        $cities = $country_service->getCities(request('country_id'));

        if (!count($cities)) {
            return '';
        }

        $options = "<label for='exampleFormControlInput1'>* City</label>" . "<div> <select  name='city_id' id='city' class='form-control-sm form-control p-0 '>";

        for ($i = 0; $i < count($cities); $i++) {
            $options .= "<option value=" . $cities[$i]->id . ">" . $cities[$i]->name_en . "</option>";
        }

        $options .= "</select></div>";

        return $options;
    }

    public function getNewShowroomCreate()
    {
        return view('frontend.showrooms.newCreateShowroom');
    }
}
