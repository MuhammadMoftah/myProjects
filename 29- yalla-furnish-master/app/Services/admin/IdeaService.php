<?php


namespace App\Services\admin;


use App\Idea;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class IdeaService
 * @package App\Services\admin
 */
class IdeaService
{
    /**
     * @var Idea
     */
    private $model;
    private $request;

    /**
     * IdeaService constructor.
     * @param $model
     */
    public function __construct(Idea $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    /**
     * @param int|null $page
     * @return Collection
     */
    public function listOrPaginate(int $page = 15): LengthAwarePaginator
    {
        return $this->model->with('user', 'category')->paginate($page);
    }

    /**
     * Search for a Keyword in the Idea, Category, User tables
     * @param string $keyword
     * @return LengthAwarePaginator
     */
    public function filterIdeaByKeyword(string $keyword): LengthAwarePaginator
    {
        return $this->model::query()
            ->join('categories', 'ideas.cat_id', '=', 'categories.id')
            ->join('users', 'ideas.user_id', '=', 'users.id')
            ->orwhere('ideas.name_en', 'like', "%$keyword%")
            ->orWhere('categories.name_en', 'like', "%$keyword%")
            ->orWhere('users.name', 'like', "%$keyword%")
            ->paginate();
    }

    public function getIdea(int $id)
    {
        return $this->model->where('id', $id)->with(['user'])->firstOrFail();
    }

    public function storeIdea($creatorId = null)
    {
        $idea = $this->model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'user_id' => isset($this->request->user_id) && !$creatorId ? $this->request->user_id : $creatorId,
            'idea_image' => $this->request->idea_image,
            'active' => $creatorId ? 0 : 1,
        ]);

        $idea->categories()->attach($this->request->categories);
        $idea->paragraphs()->createMany($this->request->paragraphs);

        return $idea->id;
    }

    public function editIdea($idea)
    {
        $idea->name_en = request('name_en');
        $idea->name_ar = request('name_ar');
        if (request()->route()->getName() == "admin.idea.update") {
            $idea->user_id = request('user_id');
        }
        $idea->idea_image = request('idea_image');
        $idea->categories()->sync($this->request->categories);
        $idea->save();
    }

    public function deleteIdea($id)
    {
        $idea = $this->getIdea($id);
        Storage::disk('s3')->delete('ideas/' . $idea->getOriginal('idea_image'));
        $idea->delete();
    }

    public function changeStatus($id)
    {
        $idea = $this->getIdea($id);

        $idea->active ? $idea->update(['active' => 0]) : $idea->update(['active' => 1]);
    }

    public function dismissIdea($id, $reason)
    {
        $idea = $this->getIdea($id);

        $idea->update(['active' => 0, 'reason' => $reason]);
    }
}
