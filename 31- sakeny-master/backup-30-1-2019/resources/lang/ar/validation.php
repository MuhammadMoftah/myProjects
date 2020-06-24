<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "رابط :attribute غير صحيح.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => " :attribute يجب ان يحتوي علي حروف و ارقام فقط.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
	"numeric" => ":attribute يجب ان يكون من :min الي :max",
	"file"    => "The :attribute must be between :min and :max kilobytes.",
	"string"  => "The :attribute must be between :min and :max characters.",
	"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => ":attribute قيمه غير صحيحه",
	"confirmed"            => ":attribute غير متطابق",
	"date"                 => "ليس بتاريخ :attribute",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => ":attribute و :other يجب ان يكونو مختلفين",
	"digits"               => ":attribute يجب ان يكون :digits رقم",
	"digits_between"       => ":attribute يجب ان يكون من :min الي :max رقم",
	"email"                => "يجب ان يكون ايميل متاح",
	"filled"               => "The :attribute field is required.",
	"exists"               => " :attribute غير صحيح.",
	"image"                => ":attribute يجب ان يكون صوره",
	"in"                   => "قيمه غير صحيحه",
	"integer"              => "يجب ان يكون :attribute مكون من ارقام",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
	"numeric" => ":attribute يجب ان يكون اكثر من:max.",
	"file"    => "The :attribute may not be greater than :max kilobytes.",
	"string"  => ":attribute يجب ان لا يزيدو عن :max حرف.",
	"array"   => "The :attribute may not have more than :max items.",
	],
	"mimes"                => ":attribute يجب ان تكون :values.",
	"min"                  => [
	"numeric" => ":attribute يجب ان يكون :min علي الأقل.",
	"file"    => "The :attribute must be at least :min kilobytes.",
	"string"  => ":attribute يجب ان تكون :min حروف علي الأقل",
	"array"   => "The :attribute must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "يجب ان يكون :attribute مكون من ارقام",
	"regex"                => ":attribute قيمه غير صحيحه.",
	"required"             => ":attribute مطلوب ادخاله",
	"required_if"          => ":attribute مطلوب ادخاله عندما :other تكون :value.",
	"required_with"        => ":attribute مطلوب ادخاله عندما :values تكون مقدمة.",
	"required_with_all"    => ":attribute مطلوب ادخاله عندما :values تكون مقدمة.",
	"required_without"     => ":attribute مطلوب ادخاله عندما :values تكون غير مقدمة.",
	"required_without_all" => ":attribute مطلوب ادخاله عندما تكون وحده من :values المقدمة.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
	"numeric" => "The :attribute must be :size.",
	"file"    => "The :attribute must be :size kilobytes.",
	"string"  => "The :attribute must be :size characters.",
	"array"   => "The :attribute must contain :size items.",
	],
	"unique"               => ":attribute تم تسجيله من قبل",
	"url"                  => ":attribute ارجو ادخال رابط صحيح ",
	"timezone"             => "The :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
	'captcha' => [
	'captcha' => ':attribute غير متطابق',
	],
	'phone'=>[
	'regex'=>' رقم الهاتف غير صحيح'
	],
	'image'=>[
	'mimes'=>' يجب ان تكون صوره'
	],
	'agreements'=>[
	'accepted'=>'يجب الموافقه علي الشروط و سياسه الموقع'
	],

	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [

	'email' => 'الايميل',
	'name' => 'الاسم',
	'message' => 'رساله',
	'subject' => 'عنوان الرساله',
	'phone' => 'رقم الموبيل',
	'telephone'=>'رقم التليفون',
	'address'=>'العنوان',
	'date' => 'التاريخ',
	'team1' => 'اسم الفريق الاول',
	'team2' => 'اسم الفريق الثاني',
	'result' => 'النتيجه',
	'team1result' => 'نتيجه القريق الاول',
	'team2result' => 'نتيجه الفريق الثاني',
	'channel_id' => 'القناه',
	'champion_id' => 'البطوله',
	'description' => 'الوصف',
	'tags' => 'كلامات الدلاليه',
	'logo' => 'الشعار',
	'stream' => 'البث',
	'satellite' => 'القمر الصناعي',
	'polarization' => 'الاستقطابي',
	'freq' => 'تردد',
	'encoding' => 'ترميز',
	'correction' => 'التصحيح',
	'encryption' => 'التشفير',
	'commentator' => 'المعلق',
	'info' => 'معلومات',
	'report' => 'تقرير',
	'title' => 'العنوان',
	'password'=>'كلمه السر',
	'old_password'=>'كلمه المرور الحاليه',
	'is_active'=>'تفعيل',
	'username'=>'اسم المستخدم',
	'port'=>'البورت',
	'host'=>'الهوست',
	'title_ar'=>'عنوان بالعربيه',
	'title_en'=>'عنوان بالانجليزيه',
	'roler'=>'الصلاحيات',
	'route'=>'رابط',
	'url'=>'رابط',
	'link'=>'رابط',
	'content'=>'محتوي',
	'comment'=>'تعليق',
	'img'=>'صوره',
	'price'=>'السعر',
	'status'=>'الحاله',
	'subtitle'=>'عنوران فرعي',
	'content_ar'=>'محتوي بالعربيه',
	'content_en'=>'محتوي بالانجليزيه',
	'password_confirmation'=>'تحقق من كلمه المرور',
	'name_ar'=>'الاسم بالعربيه',
	'name_en'=>'الاسم بالانجليزيه',
	'firstname'=>'الاسم الاول',
	'lastname'=>'الاسم الثاني',
	'captcha'=>'الكود',
	'phone1'=>'رقم االتليفون الاول',
	'phone2'=>'رقم االتليفون الثاني',
	'tab_title_1_en'=>'عنوان تاب الاولي بالأنجليزيه',
	'tab_description_1_en'=>'وصف تاب الاولي بالأنجليزيه',

	'tab_title_2_en'=>'عنوان تاب ألثانية بالأنجليزيه',
	'tab_description_2_en'=>'وصف تاب ألثانية بالأنجليزيه',

	'tab_title_3_en'=>'عنوان تاب الثالثة بالأنجليزيه',
	'tab_description_3_en'=>'وصف تاب الثالثة بالأنجليزيه',

	'tab_title_4_en'=>'عنوان تاب الرابعه بالأنجليزيه',
	'tab_description_4_en'=>'وصف تاب الرابعه بالأنجليزيه',

	'tab_title_1_ar'=>'عنوان تاب الاولي بالعربيه',
	'tab_description_1_ar'=>'وصف تاب الاولي بالعربيه',

	'tab_title_2_ar'=>'عنوان تاب ألثانية بالعربيه',
	'tab_description_2_ar'=>'وصف تاب ألثانية بالعربيه',

	'tab_title_3_ar'=>'عنوان تاب الثالثة بالعربيه',
	'tab_description_3_ar'=>'وصف تاب الثالثة بالعربيه',

	'tab_title_4_ar'=>'عنوان تاب الرابعه بالعربيه',
	'tab_description_4_ar'=>'وصف تاب الرابعه بالعربيه',

	'Company statistics'=>'أحصائيات عن الشركه',
	'satisfied_clients'=>'العملاء المستفدين',
	'workers_in_team'=>'العاملين بالفريق',
	'awards_won'=>'الجوائز الحاصلين عليها',
	'owned_vehicles'=>'السيارات المملوكه',
	'our_breanches'=>'فروعنا',
	'items_delivered'=>'السلع اللتي سُلمت',
	'address_en'=>'العنوان بالانجليزيه',
	'address_ar'=>'العنوان بالعربيه',
	'aboutus_ar'=>'من نحن بالعربيه',
	'aboutus_en'=>'من نحن بالعربيه',
	'facebook'=>'فيس بوك',
	'twitter'=>'تويتر',
	'googleplus'=>'جوجل بلص',
	'instagram'=>'انستاجام',
	'youtube'=>'يوت يوب',
	'image'=>'صوره',
	'map'=>'الخريطه',
	'message_replay'=>'الرد علي الرساله',
	'userimage'=>'صوره الكاتب',
	'amount'=>'الكمية',
	'places_categories_id'=>'القسم',
	'details'=>'تفاصيل',
	'place_name'=>'اسم المكان',
	'uses_time'=>'عدد الاستخدامات',
	'age' => 'العمر' ,
	'percentage' => 'النسبة المئوية' ,
	'age_status' => 'الفئات العمرية' ,
	'view model' => 'عرض موديل' ,
	'production_date' => 'سنة الصنع' ,
	'gender' => 'النوع' ,
	'birth_date' => 'تاريخ الميلاد' ,
	'buy_date' => 'تاريخ الشراء' ,
	'insurance_type' => 'وع التأمين' ,
	'company_id' => 'الشركة' ,
	'car_id' => 'نوع السيارة' ,
	'model_id' => 'موديل السيارة' ,
	'model_price_date_id' => 'سنة التصنيع' ,
	'buy_price' => 'ثمن الشراء' ,
	'buy_type' => 'حالة الدفع' ,
	'remaining_amount' => 'المبلغ المتبقي' ,
	'remaining_date' => 'المدة المتبقية بالشهور' ,
	'past_insurance' => 'هل لديك تأمين سابق ؟' ,
	'past_company' => 'شركة التأمين السابقة' ,
	'change_reason' => 'سبب التغيير' ,
	'insurance_type' => 'نوع التأمين المطلوب' ,
	'insurance_type' => 'نوع التأمين المطلوب' ,
	'city' => 'المحافظة' ,
	'code' => 'الكود' ,
	'story_ar'=>'الرساله بالعربيه',
	'story_en'=>'الرساله بالانجليزيه',
	
	'first_name'=>'الإسم الأول',
	'last_name'=>'الأسم الاخير',
	'phone_number'=>'رقم الهاتف',
	'email'=>'البريد الالكتروني',
	'unit_price'=>'سعر الوحده',
	'amount'=>'السعر',
	'currency'=>'العمله',
	'billing_address'=>'العنوان',
	'state'=>'ولايه \ محافظه',
	'city'=>'مدينه',
	'country'=>'دولة',
	'postal_code'=>'الرقم البريدي',
	'profit_amount'=>'مقدار الأرباح',
	'referral_amount'=>'مبلغ الإحاله',
	'number_acount_bank'=>'رقم الحساب البنكي',
	'main_acount'=>'الحساب الرئيسي',
	'id'=>'الرقم التعريفي',
	'country'=>'الدوله',
	'city'=>'المدينه',
	'type'=>'النوع',
	'area'=>'المنطقة',
	'owner_name'=>'اسم المالك',
	'mobile'=>'الجوال',
	'company_name'=>'اسم الشركة',
	'commercial_record'=>'السجل التجاري',
	'number_of_emplyees'=>'عدد الموظفين',
	'financial'=>'لانظام المحاسبي',
	'start_at'=>'تاريخ البدء',
	'end_at'=>'تاريخ انتهاء ',
	'paid_amount'=>'المدفع',
	'title.*'=>'العنوان',
	'cover'=>'صورة الكوفر',
	'Password Confirmation'=>'تاكيد كلمه المرور',
	'Password'=>'كلمة المرور',
	'service_requirements'=>'متطلبات اللتي يجب توفيرها',
	'worker_gender'=>'نوع العاملين',
	'number_of_worker'=>'عدد العاملين',
	'required_time'=>'الوقت المطلوب لتنفيذ العمل',
	'price_of_addition_unit'=>'سعر الوحده الزياده',
	'user_id'=>'العضو'
	],

];
