<?php
namespace Core;

abstract class Helpers {

public static function truncate( string $string, int $lg_max=50) :string {
    if (strlen($string) > $lg_max)
    {
        $string = substr($string, 0, $lg_max);
        $last_space = strrpos($string, " ");
        
        return substr($string, 0, $last_space)."...";
    }
    else
    {
        return $string; 
    }
}
public static function dateFormator(string $date, string $format = "d/m/Y") : string{
    return date($format, strtotime($date));
}

public static function slugify(string $string): string{
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);    
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}
}
//traduction des Helpers : 
//Helpers::slugify(''); => classe abstract