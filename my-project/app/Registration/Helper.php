<?php

namespace App\Registration;

class Helper {
    public static function generate_username(String $name, String $surname)
    {
        $text = $surname . mb_substr($name, 0, 3);

        $ascii = iconv("utf-8", "us-ascii//TRANSLIT", $text);

        return strtolower($ascii);
    }
}
