<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\admin\FileManagerService;
use Illuminate\Support\Facades\Storage;

class FileManangerController extends Controller
{
    protected $fileMangerService;

    public function __construct(FileManagerService $fileMangerService)
    {
        $this->fileMangerService = $fileMangerService;
    }

    //
    public  function index(Request $request)
    {
        $images =  $this->fileMangerService->getImages();
        
        return view('admin.pages.uitilities.index', compact('images'));
    }

    public function store(Request $request)
    {
        $this->fileMangerService->checkUplodateValidation($request);
        $this->fileMangerService->saveImages($request);
        return back()->withMessage('images uploded successfully');
    }

    public  function delteImages(Request $request)
    {
        $this->fileMangerService->deleteImags($request);
        return back()->withMessage('images deleted successfully');
    }
}
