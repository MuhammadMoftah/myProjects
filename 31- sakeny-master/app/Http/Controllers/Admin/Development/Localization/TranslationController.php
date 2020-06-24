<?php

namespace App\Http\Controllers\Admin\Development\Localization;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoreController;
use App\Models\Development\Localization\Language;
use App\Models\Development\Localization\Translation;
use App\Models\Development\Localization\TranslationKeys;

class TranslationController extends CoreController
{
    function __construct(TranslationKeys $model)
    {
        $this->model = $model;
        $languages = Language::Active()->get();
        view()->share(compact('languages'));
        parent::__construct();

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $rows = $this->model->latest()->get();

        return $this->view('index',array(
                                         'rows'=>$rows,
                                         'breadcrumb'=>$this->breadcrumb));
    }


    public function onStore()
    {
       return $this->v([
            'name' => 'required|unique:translation_keys',
        ]);
    }

    public function isStored($row)
    {

        $translations = request('language');
        foreach ($translations as $key => $word) {
            $row->translations()->create([
                'language_id'=>$key,
                'value'=>$word
            ]);
        }
    }

   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|unique:translation_keys,name,'.request()->route('translation'),
            ]);
    }

    public function isUpdated($row)
    {
        $row->translations()->delete();
        $translations = request('language');
        foreach ($translations as $key => $word) {
            $row->translations()->create([
                'language_id'=>$key,
                'value'=>$word
            ]);
        }
    }

}
