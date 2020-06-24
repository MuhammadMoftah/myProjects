<?php

namespace App\Http\Controllers\user;

use App\Boards;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use App\SavedItem;
use App\Services\site\BoardService;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    protected $board_service;

    public function __construct(BoardService $board_service)
    {
        $this->board_service = $board_service;
    }

    public function postBoard(BoardRequest $request)
    {
        $this->board_service->storeBoard();
        return back()->withMessage('Board Created Successfully');
    }

    public function update_board(BoardRequest $request, $id)
    {
        $this->board_service->UpdateBoard($id);
        return back()->withMessage('Board updated Successfully');
    }
    // get board saved Items
    public function get_saved_item_board($id)
    {
        $saved_items = $this->board_service->getItems($id);
        return view('frontend.boards.item_board', compact('saved_items'));
    }

    public function create_save(Boards $board, SavedItem $saved_item_model)
    {
        if (request('type') == 'product') {
            $board = $board->create([
                'name' => request()->board_name,
                'private' => request()->board_type == 0 ? 0 : 1,
                'user_id' => auth()->guard('user')->user()->id,
            ]);

            $saved_item_model->create([
                'board_id' => $board->id,
                'product_id' => request('product_id'),
            ]);
            return "ok";
        } elseif (request('type') == 'idea') {
            $board = $board->create([
                'name' => request()->board_name,
                'private' => request()->board_type == 0 ? 0 : 1,
                'user_id' => auth()->guard('user')->user()->id,
            ]);

            $saved_item_model->create([
                'board_id' => $board->id,
                'idea_id' => request('idea_id'),
            ]);
            return "ok";
        } elseif (request('type') == 'topic') {
            $board = $board->create([
                'name' => request()->board_name,
                'private' => request()->board_type == 0 ? 0 : 1,
                'user_id' => auth()->guard('user')->user()->id,
            ]);

            $saved_item_model->create([
                'board_id' => $board->id,
                'topic_id' => request('topic_id'),
            ]);
            return "ok";
        }
    }


    public function getUserBoard($id)
    {
        $board = $this->board_service->getPublicBoard($id);
        $user = $board->user;
        $board_items = $this->board_service->getBoardItems($board->id);

        if (request()->ajax()) {

            return view('frontend.includes.items_data', compact('board_items'));
        }

        return view('frontend.boards.userBoard', compact('board', 'user', 'board_items'));
    }

    public function getSingleBoard($id)
    {
        $board = $this->board_service->getSingleBoard($id);
        $user = $board->user;
        $board_items = $this->board_service->getBoardItems($board->id);

        if (request()->ajax()) {
            $type = request()->type;
            return view('frontend.includes.items_data', compact('board_items', "type"));
        }

        return view('frontend.boards.myBoard', compact('board', 'user', 'board_items'));
    }

    public function deleteBoard($id)
    {
        $this->board_service->delete($id);
        return redirect()->route('user.my.profile');
    }
}
