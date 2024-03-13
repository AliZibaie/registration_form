<?php

use App\Enums\RegistrationStatus;

return [
    RegistrationStatus::ACCEPTED->value => 'درخواست شما تایید شده است ، کارشناس با شما تماس خواهد گرفت.',
    RegistrationStatus::REJECTED->value => 'متاسفانه درخواست شما رد شده است.',
    RegistrationStatus::RETURNED->value => 'اطلاعات شما نیازمند اصلاح است لطفا از قسمت ادامه با کد رهگیری خود نسبت به اصلاح اقدام نمایید.',
    RegistrationStatus::NOT_COMPLETED->value => 'اطلاعات شما هنوز کامل نشده است لطفا از قسمت ادامه با کد رهگیری خود نسبت به اصلاح اقدام نمایید.',
    RegistrationStatus::PENDING->value => 'درخواست شما در صف بررسی قرار دارد.' ,
    'not_completed' => 'اطلاعات شما کامل نیست لطفا از قسمت ادامه با کد رهگیری تان نسبت به تکمیل اقدام نمایید.'
];
