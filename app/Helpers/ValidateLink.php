<?php

namespace App\Helpers;

class ValidateLink
{
   public static function isLink(string $value){
    return preg_match('/^(https?:\/\/)?([\w\-]+\.)+[\w]{2,}(\/\S*)?$/', $value);
   }
}
