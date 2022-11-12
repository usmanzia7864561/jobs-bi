<?php

namespace App\Registration;

class Helper {
    public static function generate_username(String $name, String $surname)
    {

        $text = $surname . substr($name, 0, 3);

        setlocale(LC_ALL, 'czech'); // záleží na použitém systému

        return iconv("utf-8", "us-ascii//TRANSLIT", strtolower($text));
    }
}
