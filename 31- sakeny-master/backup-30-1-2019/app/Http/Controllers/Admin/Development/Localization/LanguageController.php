<?php

namespace App\Http\Controllers\Admin\Development\Localization;

use File;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoreController;
use App\Models\Development\Localization\Language;
use App\Models\Development\Localization\TranslationKeys;

class LanguageController extends CoreController
{
    function __construct(Language $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','name','activation');
        $this->show_columns_select = array('id','name','activation');
        parent::__construct();

    }


       /**
     * Before go inside @index method
     * @return avoid
     */
    public function onIndex()
    {
        $this->custom_columns = [
            [
                'name'=>'activation',
                'value'=>function($row){
                   return $row->activation ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
                }
            ]
        ];

        $languages = Language::Active()->get();
        view()->share(compact('languages'));


    }



    public function formBuilder()
    {
         $this->formInput =
        [
            [
                'name'=>'name',
                'label'=>trans('lang.name'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'name',
                    'class'=>'form-control'
                ]
            ],

            [
                'name'=>'activation',
                'label'=>trans('lang.activation'),
                'type'=>'select',
                'select_options'=>[1=>trans('lang.active'),0=>trans('lang.deactivate')],
                'value'=>null,
                'options'=>
                [
                    'id'=>'activation',
                    'class'=>'form-control'
                ]
            ],

        ];
    }



    public function onStore()
    {
       return $this->v([
            'name' => 'required|unique:languages',
            ]);
    }

   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|unique:languages,name,'.request()->route('language'),
            ]);
    }


    public function postTranslations($id)
    {
        try {
            $code = eval(request('lang'));
            // dd($translations);
            foreach ($translations as $key => $value) {
                $this->insertKeyWithValue($id, $key, $value);
            }
            return redirect('admin/development/localization/translation')->withSuccess('Your translations file exported successfully.');
        } catch (\Exception $e) {
            return back()->withFailed('Please Insert required formating!');
        }
    }

    public function insertKeyWithValue($id, $key, $value)
    {
        $translation_key = new TranslationKeys;
        $fetchingKey = $translation_key->where('name',$key);
        if ($fetchingKey->count() == 0) {
            $insertionKey = $translation_key->create([
                                    'name'=>$key,
                                    'insertion_type'=>'File',
                                    'status'=>'Pending',
                            ]);
            $insertionKey->translations()->create([
                'language_id'=>$id,
                'value'=>$value
            ]);
        }
        elseif($fetchingKey->count() > 0 && request('option') == 2) {
            $getTrans = $fetchingKey->first()->translations()->whereLanguageId($id);
            if ($getTrans->count() == 0) {
                $fetchingKey->first()->translations()->create([
                    'language_id'=>$id,
                    'value'=>$value
                ]);
            }else {
                $getTrans->update(['value'=>$value]);
            }
        }

    }


    public function postBuildTranslationsFiles()
    {
        if (count(request('languages')) == 0)
            return $this->returnMessage(false,1,['failed'=>'No language choosed for build!']);

        foreach (request('languages') as $key => $language_id) {
            $language = $this->model->find($language_id);
            $this->buildFile($language->name, $language->translations);
        }

        return $this->returnMessage(true,1,['success'=>'Files builded successfully.']);

    }

    public function buildFile($name, $array)
    {
        $path = ("resources/lang/$name/lang.php");
        $translations = '';

        foreach ($array as $key => $trans) {
            $key = $trans->translation_key->name;
            $val = $trans->value;
            $translations .= "
    '$key'=>'$val',
";
        }
$file_content = "
<?php

return [
$translations
];
";
        return Storage::disk('app')->put($path, $file_content);
    }

}
