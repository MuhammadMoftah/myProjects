<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\ParagraphService;
use App\Http\Requests\ParagraphRequest;
use Illuminate\Support\Facades\DB;

class ParagraphController extends Controller
{
    protected $request;
    protected $paragraph_service;

    public function __construct(ParagraphService $paragraph_service)
    {
        $this->paragraph_service = $paragraph_service;
    }

    public function store($idea_id, ParagraphRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->paragraph_service->store($idea_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return back()->withMessage('Paragraph created successfully');
    }

    public function update($id, ParagraphRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->paragraph_service->update($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return back()->withMessage('Paragraph Updated successfully');
    }

    public function delete($id)
    {
        $this->paragraph_service->delete($id);
        return back()->withMessage('Paragraph deleted successfully');
    }
}
