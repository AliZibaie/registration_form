<?php

namespace App\Traits;

trait HasEnumValues
{
    public static function getValues() : array
    {
        return array_map(fn($source)=>$source->value, self::cases());
    }
}
