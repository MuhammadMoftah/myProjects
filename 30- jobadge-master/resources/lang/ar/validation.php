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
		'password' => [
			'regex' => 'كلمه السر يجب ان تتكون علي الاقل من حرف كبير و حرف صغير و رقم',
		],
		'country_id' => [
			'required' => 'يجب ادخال البلد',
			'exists' => 'البلد غير صحيحه'
		],
		'city_id' => [
			'required' => 'يجب ادخال المدينه',
			'exists' => 'المدينه غير صحيحه'
		],
		'nationality_id' => [
			'required' => 'يجب ادخال الجنسيه',
			'exists' => 'الجنسيه غير صحيحه'
		],
		'industry_id' => [
			'required' => 'يجب ادخال الصناعه',
			'exists' => 'الصناعه غير صحيحه'
		],
		'size_id' => [
			'required' => 'يجب ادخال الحجم',
			'exists' => 'الحجم غير صحيحه'
		],
		'package_id' => [
			'required' => 'يجب ادخال الباقه',
			'exists' => 'الباقه غير صحيحه'
		],
		'jobtype_id' => [
			'required' => 'يجب ادخال نوع الوظيفه',
			'exists' => 'نوع الوظيفه غير صحيحه'
		],
		'category_id' => [
			'required' => 'يجب ادخال الفئه',
			'exists' => 'الفئه غير صحيحه'
		],
		'joblevel_id' => [
			'required' => 'يجب ادخال نوع الوظيفه',
			'exists' => 'نوع الوظيفه غير صحيحه'
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
		'first_name'=>'الاسم الاول',
		'last_name'=>'الاسم الاخير',
		'email'=>'البريد الالكتروني',
		'password'=>'كلمه السر',
		'title'=>'المهنه',
		'age'=>'العمر',
		'gender'=>'الجنس',
		'phone'=>'التليفون',
		'cv'=>'السره الذاتيه',
		'name'=>'الاسم',
		'logo'=>'الشعار',
		'description'=>'الوصف',
		'twitter'=>'تويتر',
		'facebook'=>'فيسبوك',
		'linked_in'=>'لينكدان',
		'url'=>'الرابط',
		'education_level'=>'المؤهل',
		'experience_years'=>'سنوات الخبره',
		'vacancies'=>'العدد الشاغر',
		'travel_frequency'=>'تردد السفر',
		'salary_from'=>'الراتب من',
		'salary_to'=>'الراتب الي',
		'salary_period'=>'مده الراتب',
		'job_requirement'=>'متطلبات الوظيفه',
		'skills'=>'المهارات',
		'benefits'=>'الفوائد',
		'KPI'=>'مؤشر الاداء الرئيسي',
		'company_url'=>'رابط الشركه',
		'cr_logo'=>'السجل التجاري',
		'video'=>'الفيديو',
		'logos'=>'الشعارات',
		'message'=>'الرساله',
		'body'=>'المحتوي',
		'company_name'=>'اسم الشركه',
		'from_date'=>'التاريخ من',
		'to_date'=>'التاريخ الي',
		'achievements'=>'الانجازات',
		'degree'=>'الدرجه العلميه',
		'major'=>'التخصص',
		'place_name'=>'الاسم',
		'from_year'=>'السنه من',
		'to_year'=>'السنه الي',
		'notes'=>'الملاحظات',
		'rate'=>'التقييم',
		'language'=>'اللغه',
		'member_id'=>'الرقم',
		'date'=>'التاريخ من',
		'expired_date'=>'التاريخ الي',
		'video_cv'=>'فيديو السيره الذاتيه',
		'image'=>'الصوره الشخصيه'
	],

];
