<?php

namespace App\Services\site;

use App\Idea;
use App\Services\site\ShareService;
use App\Traits\CacheKeyTrait;
use Illuminate\Http\Request;

class IdeaService
{
    use CacheKeyTrait;

    private $share_service;

    public function __construct(ShareService $share_service)
    {
        $this->share_service = $share_service;
    }

    public function getIdeas($paginate = 10)
    {
        return cache()->remember(CacheKeyTrait::getIdeasKey($paginate), env('SHORT_TIME_CACHE'), function () use ($paginate) {

            $ideas = new Idea;
            $ideas = $ideas->newQuery();

            if (isset(request()->keyword)) {
                $keyword = request('keyword');
                $arr = explode(" ", $keyword);
                for ($i = 0; $i < count($arr); $i++) {
                    $ideas->where(function ($query) use ($arr, $i) {
                        $query->where(function ($query) use ($arr, $i) {
                            $query->where('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhere('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                ->orWhereHas('categories', function ($query) use ($arr, $i) {
                                    $query->where('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                        ->orWhere('name_en', 'LIKE', '%' . $arr[$i] . '%');
                                });
                        });
                    });
                }
            }

            if (isset(request()->category)) {
                $category_id = request('category');
                $ideas->whereHas('categories', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                });
            }

            return $ideas->active()->latest()->with(['comments', 'saves', 'shares', 'likes', 'activeParagraphs'])->paginate($paginate);
        });
    }
    //  get single idea
    public function getSingleIdea($id)
    {
        return Idea::active()->where('id', $id)->with(['categories', 'comments', 'saves', 'shares', 'likes'])->firstOrFail();
    }
    // get related Ideas
    public function getRelated($idea)
    {
        $categories = $idea->categories()->get()->pluck('id');
        $ideas =   Idea::where('id', '!=',  $idea->id)->whereHas('categories', function ($q) use ($categories) {
            $q->whereIn('category_id', $categories);
        })->take(6)->get();
        return $ideas;
    }

    public function shareIdea($id, $provider)
    {
        $idea = $this->getSingleIdea($id);

        $this->share_service->storeShare($idea->id, 'idea');

        $link = route('user.get.idea', $idea->id);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . $idea->name_en;
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $idea->name_en;
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }

    public function getUserIdeas($userId)
    {
        $ideas = Idea::where('user_id', $userId)->active()->latest()->with(['comments', 'saves', 'shares', 'likes'])->paginate(5);
        return $ideas;
    }
}
