<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ActivitySubject: string
{
    use HasEnumValues;
    case ICT= 'ICT(نرم افزار، مخابرات، الکترونیک)';
    case MEDICALEQUIPMENT = 'تجهیزات پزشکی';
    case NANOTECHNOLOGY= 'نانو فناوری';
    case OILGAS= 'نفت و گاز و پتروشیمی';
    case MECHANICAUTOMATION= 'مکانیک و اتوماسیون';
    case CHEMICALBIOTECHNOLOGY= 'شیمی و بیوتکنولوژی';
    case OTHER= 'سایر';

}
