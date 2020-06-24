<?php

namespace App\Services\site;

use App\Boards;
use App\SavedItem;
use Illuminate\Http\Request;

class BoardService
{
    private $board_model;
    private $request;

    public function __construct()
    {
        $this->board_model = new Boards;
        $this->request = new Request;
    }

    public function storeBoard()
    {
        $this->board_model->create([
            'name' => request()->name,
            'private' => request()->status == 0 ? 0 : 1,
            'user_id' => auth()->guard('user')->user()->id,
        ]);
    }

    public function addDefaultBoards($user)
    {
        $boards = [
            [
                'name' => $user->first_name . "'s Ideas",
                'private' => 0,
                'user_id' => $user->id,
            ],
            [
                'name' => 'WhishList',
                'private' => 0,
                'user_id' => $user->id,
            ],
        ];

        $this->board_model->insert($boards);
    }

    public function getAllUserBoards($user_id)
    {
        $boards = $this->board_model->newQuery();

        if (request('keyword')) {
            $keyword = request('keyword');

            $boards->where(function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                });

                $query->orWhereHas('items', function ($query) use ($keyword) {
                    $query->whereHas('product', function ($query) use ($keyword) {
                        $query->where(function ($query) use ($keyword) {
                            $query->where('name_en', 'like', '%' . $keyword . '%')
                                ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                        })->orWhere(function ($query) use ($keyword) {
                            $query->where('description_en', 'like', '%' . $keyword . '%')
                                ->orWhere('description_ar', 'like', '%' . $keyword . '%');
                        });
                    })->orWhereHas('idea', function ($query) use ($keyword) {
                        $query->where(function ($query) use ($keyword) {
                            $query->where('name_en', 'like', '%' . $keyword . '%')
                                ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                        });
                    })->orWhereHas('topic', function ($query) use ($keyword) {
                        $query->where('body', 'like', '%' . $keyword . '%');
                    });
                });
            });
        }

        $boards->where(function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        });

        $boards = $boards->latest()->get();

        return $boards;
    }

    public function getAllPublicBoards($user_id)
    {
        $boards = $this->board_model->newQuery();

        if (request('keyword')) {
            $keyword = request('keyword');

            $boards->where(function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                });

                $query->orWhereHas('items', function ($query) use ($keyword) {
                    $query->whereHas('product', function ($query) use ($keyword) {
                        $query->where(function ($query) use ($keyword) {
                            $query->where('name_en', 'like', '%' . $keyword . '%')
                                ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                        })->orWhere(function ($query) use ($keyword) {
                            $query->where('description_en', 'like', '%' . $keyword . '%')
                                ->orWhere('description_ar', 'like', '%' . $keyword . '%');
                        });
                    })->orWhereHas('idea', function ($query) use ($keyword) {
                        $query->where(function ($query) use ($keyword) {
                            $query->where('name_en', 'like', '%' . $keyword . '%')
                                ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                        });
                    })->orWhereHas('topic', function ($query) use ($keyword) {
                        $query->where('body', 'like', '%' . $keyword . '%');
                    });
                });
            });
        }

        $boards->where(function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->public();
        });

        $boards = $boards->latest()->get();

        return $boards;
    }

    public function UpdateBoard($id)
    {
        $board = $this->board_model->findOrFail($id);

        if ($board->user_id != auth()->guard('user')->user()->id) {
            abort(401);
        }

        $board->name = request('name');
        $board->private = request('status');
        $board->save();
    }

    public function getItems($id)
    {
        return SavedItem::where('board_id', $id)->with(['board', 'user', 'product', 'idea', 'topic'])->get();
    }

    public function getPublicBoard($id)
    {
        return $this->board_model->where([
            'private' => 0,
            'id' => $id,
        ])->firstOrFail();
    }

    public function getSingleBoard($id)
    {
        return $this->board_model->where([
            'id' => $id,
        ])->firstOrFail();
    }

    public function getBoardItems($id)
    {
        $saved_items = new SavedItem();
        $saved_items = $saved_items->newQuery();

        if (isset(request()->keyword)) {
            $keyword = request()->keyword;

            $saved_items->where(function ($query) use ($keyword) {
                $query->whereHas('product', function ($query) use ($keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('name_en', 'like', '%' . $keyword . '%')
                            ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('description_en', 'like', '%' . $keyword . '%')
                            ->orWhere('description_ar', 'like', '%' . $keyword . '%');
                    });
                })->orWhereHas('idea', function ($query) use ($keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('name_en', 'like', '%' . $keyword . '%')
                            ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                    });
                })->orWhereHas('topic', function ($query) use ($keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('body', 'like', '%' . $keyword . '%');
                    });
                });
            });
        }

        if (isset(request()->type) && request()->type == 1) {
            $saved_items->where('product_id', '!=', null);
        } elseif (isset(request()->type) && request()->type == 2) {
            $saved_items->where('idea_id', '!=', null);
        } elseif (isset(request()->type) && request()->type == 3) {
            $saved_items->where('topic_id', '!=', null);
        } elseif (isset(request()->type) && request()->type == 4) {
            $saved_items->where('offer_id', '!=', null);
        }

        $saved_items = $saved_items->where('board_id', $id)->latest()->get();

        return $saved_items;
    }

    public function delete($id)
    {
        $board = $this->getSingleBoard($id);
        $board->delete();
    }
}
