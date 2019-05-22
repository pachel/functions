<?php
/**
 * Created by PhpStorm.
 * User: toth
 * Date: 21.05.2019
 * Time: 16:25
 */

/**
 * Prüft, ob "/" hinten ist
 * @param $dir
 * @return string
 */

function checkSlash($dir)
{
    if (mb_substr($dir, strlen($dir) - 1, 1) == "/") {
        return $dir;
    }
    return $dir . "/";
}

/**
 * Ein String wird generiert aus Nummern, große und kleine Buchstaben
 * @param int $lenght
 * @return string
 */
function getRandomString($lenght = 10)
{
    $chars = [
        0 => [65,90],//Großbuchstaben
        1 => [97,122],//Kleinbuchstaben
        2 => [48,57]//Nummer
    ];
    $string = "";
    for($x=0;$x<$lenght;$x++)
    {
        $type = mt_rand(0,2);
        $string .= chr(mt_rand($chars[$type][0],$chars[$type][1]));
    }
    return $string;
}

/**
 * Ein String wird generiert aus Nummern, große und kleine Buchstaben
 * @param int $lenght
 * @return string
 */
function getUid($lenght = 32)
{
    $string = md5(time().microtime().mt_rand(0,9999));
    if(strlen($string) > $lenght){
        $string = substr($string,0,$lenght);
    }
    return $string;
}

function getSize($size)
{
    if($size<1024){
        return $size." bytes";
    }
    $size = $size/1024;
    if($size<1024){
        return round($size)." kB";
    }
    $size = $size/1024;
    if($size<1024){
        return round($size,2)." Mb";
    }
    $size = $size/1024;
    if($size<1024){
        return round($size,2)." Gb";
    }
    $size = $size/1024;
    return round($size,2)." Tb";
}