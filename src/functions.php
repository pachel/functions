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
/**
 * Prüft, ob "/" hinten ist
 * @param $dir
 * @return string
 */
if (!function_exists("checkSlash")) {

    function checkSlash($dir) {
        if (mb_substr($dir, strlen($dir) - 1, 1) == "/") {
            return $dir;
        }
        return $dir . "/";
    }

}
/**
 * Ein String wird generiert aus Nummern, große und kleine Buchstaben
 * @param int $lenght
 * @return string
 */
if (!function_exists("getRandomString")) {

    function getRandomString($lenght = 10) {
        $chars = [
            0 => [65, 90], //Großbuchstaben
            1 => [97, 122], //Kleinbuchstaben
            2 => [48, 57]//Nummer
        ];
        $string = "";
        for ($x = 0; $x < $lenght; $x++) {
            $type = mt_rand(0, 2);
            $string .= chr(mt_rand($chars[$type][0], $chars[$type][1]));
        }
        return $string;
    }

}
/**
 * XOR encrypts a given string with a given key phrase.
 *
 * @param     string $InputString Input string
 * @param     string $KeyPhrase   Key phrase
 * @return    string    Encrypted string
 */
if (!function_exists("XOREncryption")) {

    function XOREncryption($InputString, $KeyPhrase) {
        $KeyPhraseLength = strlen($KeyPhrase);

        // Loop trough input string
        for ($i = 0; $i < strlen($InputString); $i++) {

            // Get key phrase character position
            $rPos = $i % $KeyPhraseLength;

            // Magic happens here:
            $r = ord($InputString[$i]) ^ ord($KeyPhrase[$rPos]);

            // Replace characters
            $InputString[$i] = chr($r);
        }

        return $InputString;
    }

}

// Helper functions, using base64 to
// create readable encrypted texts:
if (!function_exists("xorEnc")) {

    function xorEnc($InputString) {
        if (!session_id()) {
            die('error: no session! (xorEnc)');
        }
        $InputString .= '';
        $InputString = XOREncryption($InputString, session_id());
        $InputString = base64_encode($InputString);

        return $InputString;
    }

}
if (!function_exists("xorDec")) {

    function xorDec($InputString) {
        if (!session_id()) {
            die('error: no session! (xorDec)');
        }
        $InputString .= '';
        $InputString = base64_decode($InputString);
        $InputString = XOREncryption($InputString, session_id());

        return $InputString;
    }

}

