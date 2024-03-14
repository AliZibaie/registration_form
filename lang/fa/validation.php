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
    'accepted' => 'گزینه :attribute باید تایید شود',
    'accepted_if' => 'زمانی که گزینه :other برابر :value است :attribute باید تایید شود',
    'active_url' => 'گزینه :attribute یک آدرس سایت معتبر نیست',
    'after' => 'گزینه :attribute باید تاریخی بعد از :date باشد',
    'after_or_equal' => 'گزینه :attribute باید تاریخی مساوی یا بعد از :date باشد',
    'alpha' => 'گزینه :attribute باید تنها شامل حروف باشد',
    'alpha_dash' => 'گزینه :attribute باید تنها شامل حروف، اعداد، خط تیره و زیر خط باشد',
    'alpha_num' => 'گزینه :attribute باید تنها شامل حروف و اعداد باشد',
    'array' => 'گزینه :attribute باید آرایه باشد',
    'ascii' => 'گزینه :attribute تنها میتواند شامل تک حرف، عدد یا نماد ها باشد. .',
    'before' => 'گزینه :attribute باید تاریخی قبل از :date باشد',
    'before_or_equal' => 'گزینه :attribute باید تاریخی مساوی یا قبل از :date باشد',
    'between' => [
        'array' => 'گزینه :attribute باید بین :min و :max آیتم باشد',
        'file' => 'گزینه :attribute باید بین :min و :max کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید بین :min و :max باشد',
        'string' => 'گزینه :attribute باید بین :min و :max کاراکتر باشد',
    ],
    'boolean' => 'گزینه :attribute تنها می تواند صحیح یا غلط باشد',
    'confirmed' => 'تایید مجدد گزینه :attribute صحیح نمی باشد',
    'current_password' => 'رمزعبور صحیح نمی باشد',
    'date' => 'گزینه :attribute یک تاریخ صحیح نمی باشد',
    'date_equals' => 'گزینه :attribute باید تاریخی مساوی با :date باشد',
    'date_format' => 'گزینه :attribute با فرمت :format همخوانی ندارد',
    'decimal' => 'گزینه :attribute باید :decimal رقم اعشار داشته باشد.',
    'declined' => 'گزینه :attribute باید رد شود',
    'declined_if' => 'گزینه :attribute زمانی که :other برابر :value است باید رد شود',
    'different' => 'گزینه :attribute و :other باید متفاوت باشند',
    'digits' => 'گزینه :attribute باید :digits عدد باشد',
    'digits_between' => 'گزینه :attribute باید بین :min و :max عدد باشد',
    'dimensions' => 'ابعاد تصویر گزینه :attribute مجاز نمی باشد',
    'distinct' => 'گزینه :attribute دارای افزونگی داده می باشد',
    'doesnt_end_with' => 'گزینه :attribute نباید با این مقادیر به پایان برسد: :values.',
    'doesnt_start_with' => 'گزینه :attribute نباید با این مقادیر شروع شود: :values.',
    'email' => 'گزینه :attribute باید یک آدرس ایمیل صحیح باشد',
    'ends_with' => 'گزینه :attribute باید با یکی از این مقادیر پایان یابد، :values',
    'enum' => 'گزینه :attribute صحیح نمی باشد',
    'exists' => 'گزینه انتخاب شده :attribute صحیح نمی باشد',
    'file' => 'گزینه :attribute باید یک فایل باشد',
    'filled' => 'گزینه :attribute نمی تواند خالی باشد',
    'gt' => [
        'array' => 'گزینه :attribute باید بیشتر از :value آیتم باشد',
        'file' => 'گزینه :attribute باید بزرگتر از :value کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید بزرگتر از :value باشد',
        'string' => 'گزینه :attribute باید بزرگتر از :value کاراکتر باشد',
    ],
    'gte' => [
        'array' => 'گزینه :attribute باید :value آیتم یا بیشتر داشته باشد',
        'file' => 'گزینه :attribute باید بزرگتر یا مساوی :value کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید بزرگتر یا مساوی :value باشد',
        'string' => 'گزینه :attribute باید بزرگتر یا مساوی :value کاراکتر باشد',
    ],
    'image' => 'گزینه :attribute باید از نوع تصویر باشد',
    'in' => 'گزینه انتخابی :attribute صحیح نمی باشد',
    'in_array' => 'گزینه :attribute در :other وجود ندارد',
    'integer' => 'گزینه :attribute باید از نوع عددی باشد',
    'ip' => 'گزینه :attribute باید آی پی آدرس باشد',
    'ipv4' => 'گزینه :attribute باید آی پی آدرس ورژن 4 باشد',
    'ipv6' => 'گزینه :attribute باید آی پی آدرس ورژن 6 باشد',
    'json' => 'گزینه :attribute باید از نوع رشته جیسون باشد',
    'lowercase' => 'گزینه :attribute باید با حروف کوچک باشد.',
    'lt' => [
        'array' => 'گزینه :attribute باید کمتر از :value آیتم داشته باشد',
        'file' => 'گزینه :attribute باید کمتر از :value کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید کمتر از :value باشد',
        'string' => 'گزینه :attribute باید کمتر از :value کاراکتر باشد',
    ],
    'lte' => [
        'array' => 'گزینه :attribute نباید کمتر از :value آیتم داشته باشد',
        'file' => 'گزینه :attribute باید مساوی یا کمتر از :value کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید مساوی یا کمتر از :value باشد',
        'string' => 'گزینه :attribute باید مساوی یا کمتر از :value کاراکتر باشد',
    ],
    'mac_address' => 'گزینه :attribute باید یک مک آدرس معتبر باشد',
    'max' => [
        'array' => 'گزینه :attribute نباید بیشتر از :max آیتم داشته باشد',
        'file' => 'گزینه :attribute نباید بزرگتر از :max کیلوبایت باشد',
        'numeric' => 'گزینه :attribute نباید بزرگتر از :max باشد',
        'string' => 'گزینه :attribute نباید بزرگتر از :max کاراکتر باشد',
    ],
    'max_digits' => 'گزینه :attribute نباید بیشتر از :max رقم باشد',
    'mimes' => 'گزینه :attribute باید دارای یکی از این فرمت ها باشد: :values',
    'extensions' => 'گزینه :attribute باید دارای یکی از این فرمت ها باشد: :values',
    'mimetypes' => 'گزینه :attribute باید دارای یکی از این فرمت ها باشد: :values',
    'min' => [
        'array' => 'گزینه :attribute باید حداقل :min آیتم داشته باشد',
        'file' => 'گزینه :attribute باید حداقل :min کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید حداقل :min باشد',
        'string' => 'گزینه :attribute باید حداقل :min کاراکتر باشد',
    ],
    'min_digits' => 'گزینه :attribute باید حداقل :min رقم باشد',
    'missing' => 'گزینه :attribute نباید تعریف شود.',
    'missing_if' => 'گزینه :attribute زمانی که مقدار :other برابر :value می باشد، نباید تعریف شود',
    'missing_unless' => 'گزینه :attribute نباید تعریف شود مگر اینکه گزینه :other برابر :value باشد',
    'missing_with' => 'گزینه :attribute زمانی که مقدار :values تعریف شده است دیگر نباید تعریف شود.',
    'missing_with_all' => 'گزینه :attribute زمانی که :values مقدار دارد دیگر نباید تعریف شود.',
    'multiple_of' => 'گزینه :attribute باید حاصل ضرب :value باشد',
    'not_in' => 'گزینه انتخابی :attribute صحیح نمی باشد',
    'not_regex' => 'فرمت گزینه :attribute صحیح نمی باشد',
    'numeric' => 'گزینه :attribute باید از نوع عددی باشد',
    'password' => [
        'letters' => 'گزینه :attribute باید حداقل شامل یک حرف باشد',
        'mixed' => 'گزینه :attribute باید شامل حداقل یک حرف بزرگ و یک حرف کوچک باشد',
        'numbers' => 'گزینه :attribute باید شامل حداقل یک عدد باشد',
        'symbols' => 'گزینه :attribute باید شامل حداقل یک کارکتر خاص باشد',
        'uncompromised' => 'محتوای وارده شده در :attribute ایمن نمی باشد. لطفا گزینه :attribute را اصلاح فرمایید',
    ],
    'present' => 'گزینه :attribute باید از نوع درصد باشد',
    'prohibited' => 'گزینه :attribute مجاز نمی باشد',
    'prohibited_if' => 'گزینه :attribute زمانی که :other برابر :value باشد مجاز نمی باشد',
    'prohibited_unless' => 'گزینه :attribute مجاز نیست مگر :other برابر :values باشد',
    'prohibits' => 'گزینه :attribute باعث ممنوعیت :other می باشد',
    'regex' => 'فرمت گزینه :attribute صحیح نمی باشد',
    'required' => 'تکمیل گزینه :attribute الزامی است',
    'required_array_keys' => 'گزینه :attribute باید شامل مقادیر: :values باشد',
    'required_if' => 'تکمیل گزینه :attribute زمانی که :other دارای مقدار :value است الزامی می باشد',
    'required_if_accepted' => 'تکمیل گزینه :attribute زمانی که :other انتخاب شده الزامی است',
    'required_unless' => 'تکمیل گزینه :attribute الزامی می باشد مگر :other دارای مقدار :values باشد',
    'required_with' => 'تکمیل گزینه :attribute زمانی که مقدار :values درصد است الزامی است',
    'required_with_all' => 'تکمیل گزینه :attribute زمانی که مقادیر :values درصد است الزامی می باشد',
    'required_without' => 'تکمیل گزینه :attribute زمانی که مقدار :values درصد نیست الزامی است',
    'required_without_all' => 'تکمیل گزینه :attribute زمانی که هیچ کدام از مقادیر :values درصد نیست الزامی است',
    'same' => 'گزینه های :attribute و :other باید یکی باشند',
    'size' => [
        'array' => 'گزینه :attribute باید شامل :size آیتم باشد',
        'file' => 'گزینه :attribute باید :size کیلوبایت باشد',
        'numeric' => 'گزینه :attribute باید :size باشد',
        'string' => 'گزینه :attribute باید :size  کاراکتر باشد',
    ],
    'starts_with' => 'گزینه :attribute باید با یکی از این مقادیر شروع شود، :values',
    'string' => 'گزینه :attribute باید تنها شامل حروف باشد',
    'timezone' => 'گزینه :attribute باید از نوع منطقه زمانی صحیح باشد',
    'unique' => 'این :attribute از قبل ثبت شده است',
    'uploaded' => 'بارگذاری گزینه :attribute شکست خورد',
    'uppercase' => 'گزینه :attribute باید با حروف بزرگ باشد',
    'url' => 'فرمت :attribute اشتباه است',
    'ulid' => 'گزینه :attribute باید یک ULID صحیح باشد.',
    'uuid' => 'گزینه :attribute باید یک UUID صحیح باشد',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تاییدیه رمز عبور',
        'national_code' => 'کدملی',
        'mobile_number' => 'شماره موبایل',
        'phone_number' => 'تلفن',

        // otp
        'signature' => 'امضا',
        'code' => 'کد یکبار مصرف',

        // company
        'description' => 'توضیحات',

        'activity_area' => 'محور فعالیت',
        'fax_number' => 'نمابر',
        'activity_summary' => 'خلاصه فعالیت کنونی',
        'company_registration_number' => 'شماره ثبت شرکت',
        'danesh_bonyan_license_issuance_date' => 'تاریخ صدور مجوز دانش بنیان',
        'company_registration_place' => 'محل ثبت شرکت',
        'danesh_bonyan_license_validity_date' => 'تاریخ اعتبار مجوز دانش بنیان',
        'license_issuance_date' => 'تاریخ صدور مجوز',
        'license_title' => 'عنوان مجوز',
        'license_validity_date' => 'تاریخ انقضای مجوز شرکت',
        'license_issuance_reference' => 'محل صدور مجوز شرکت',
        'english_name' => 'نام به انگلیسی',
        'is_danesh_bonyan' => 'آِیا شرکت دانش بیان است؟',
        'danesh_bonyan_license_type' => 'نوع مجوز دانش بیان',
        'company_type' => 'نوع شرکت',
        'national_card_and_birth' => 'توضیحات',
        'activity_subject' => 'موضوع فعالیت',
        'activity_specialty' => 'زمینه تخصصی فعالیت',
        'file' => 'فایل',

        'experience_file' => 'سابقه فعالیت',
        'company_field_id' => 'حوزه تخصصی',
        'company_registration_type_id' => 'نوع ثبتی',
        'city_id' => 'شهر',
        'state_id' => 'استان',
        'address' => 'آدرس',
        'website' => 'وبگاه',
        'national_passport' => 'شناسه ملی',
        'statue' => 'اساسنامه شرکت',
        'establishment_ad_file' => 'آگهی تاسیس',
        'last_management_ad_file' => 'آخرین آگهی',
        'ceo_passport_file' => 'شناسنامه مدیر عامل',
        'ceo_national_card_file' => 'کارت ملی ',
        'tax_statement_file' => 'اظهارنامه مالیاتی',
        'resume_file' => 'رزومه',
        'ownership_doc_file' => 'مستندات مالکیت',
        'work_space_images' => 'تصاویر فضای اشتراکی',
        'work_space_images.*' => 'تصویر فضای کار',


        /* founding entity
        /* as company
         * .
         * .
         * .
         */

        //explanatory plan

        'plan_prediction' => 'پیش بینی برنامه',
        'plan_prediction.*.year' => 'سال',
        'plan_prediction.*.pre_acceleration_stage' => 'تعداد تیم',
        'plan_prediction.*.acceleration_stage' => 'تعداد تیم',
        'plan_prediction.*.exit_stage' => 'تعداد تیم',

        'cost_prediction' => 'هزینه ها',
        'cost_prediction.*.year' => 'سال',
        'cost_prediction.*.start_up_cost' => 'پیش بینی هزینه',
        'cost_prediction.*.manpower_cost' => 'هزینه نیروی انسانی',
        'cost_prediction.*.investing_cost' => 'هزینه سرمایه گذاری نقدی',
        'cost_prediction.*.current_costs' => 'هزینه های جاری',
        'cost_prediction.*.other_costs' => 'سایر هزینه ها',
        'cost_prediction.*.description' => 'توضیحات',


        'income_prediction' => 'درآمدها',
        'income_prediction.*.year' => 'سال',
        'income_prediction.*.dividend_income' => 'درآمد ناشی از سود سهام و فروش',
        'income_prediction.*.shares_saleIncome' => 'درآمد ناشی از فروش سهام',
        'income_prediction.*.project_income' => 'درآمد پروژه های سازمانی',
        'income_prediction.*.workshops_income' => 'درآمد برگزاری رویداد',
        'income_prediction.*.other_incomes' => 'سایر درآمد ها',
        'income_prediction.*.description' => 'توضیحات',

        'payment_source' => 'محل تامین هزینه',
        'payment_source_file' => 'فایل مربوط به تامین هزینه ها',
        'payment_source_value' => 'مقدار مربوط به تامین هزینه ها',


        // education events

        'acceleration_events' => 'رویداد ها',
        'acceleration_events.*.title' => 'عنوان',
        'acceleration_events.*.target' => 'هدف',
        'acceleration_events.*.audience_community' => 'جامعه مخاطب',
        'acceleration_events.*.repeats_per_year' => 'تکرار در سال',

        'workshop' => 'کارگاه',
        'workshop.*.title' => 'عنوان',
        'workshop.*.hours' => 'ساعت کارگاه',
        'workshop.*.stage' => 'مرحله برگزاری',


        'educator' => 'منتورها',
        'educator.*.full_name' => 'نام منتور',
        'educator.*.mentoring_experience' => 'سابقه منتوری',
        'educator.*.business_startup' => 'سابقه کسب و کار',
        'educator.*.mentor_type' => 'نوع منتور',
        'educator.*.degree_edu' => 'مدرک تحصیلی',
        'educator.*.major_edu' => 'رشته تحصیلی',
        'educator.*.resume' => 'رزومه',

        // accelerator levels
        'tracking_code' => 'کد رهگیری',
        'company_id' => 'شرکت',
        'selection_process' => 'فرایند شناسایی',
        'pre_acc_kpi' => 'کی پی آی ورود به پیش شتابدهی',
        'pre_acc_income' => 'آورده نقدی',
        'pre_acc_commitments' => 'تعهدات',
        'pre_acc_time' => 'زمان شتابدهی',
        'pre_acc_stock' => 'سهام دریافتی',
        'acc_kpi' => 'کی پی آی',
        'acc_time' => 'زمان شتابدهی',
        'acc_income' => 'آورده نقدی',
        'acc_commitments' => 'تعهدات',
        'acc_stock' => 'سهام دریافتی',
        'exit_kpi' => 'کی پی آی خروج',
        'tax_exit_plan' => 'برنامه خروج تیم ها'
    ],

];
