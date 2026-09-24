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
if (!function_exists("checkSlash")) {

    function checkSlash($dir)
    {
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

    function getRandomString($lenght = 10)
    {
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
if (!function_exists("encodeString")) {

    function encodeString($string)
    {
        $h = 36;
        $kesz = true;
        while ($kesz) {

        }
    }

}
if (!function_exists("legnagyobbHatvany")) {

    function legnagyobbHatvany($int, $szamkor)
    {
        //pow();
    }

}
if (!function_exists("decodeString")) {

    function decodeString($int, $lenght = 12)
    {

    }

}
/**
 * Ein String wird generiert aus Nummern, große und kleine Buchstaben
 * @param int $lenght
 * @return string
 */
if (!function_exists("getUid")) {

    function getUid($lenght = 32)
    {
        $string = md5(time() . microtime() . mt_rand(0, 9999));
        if (strlen($string) > $lenght) {
            $string = substr($string, 0, $lenght);
        }
        return $string;
    }

}
if (!function_exists("getSize")) {

    function getSize($size)
    {
        if ($size < 1024) {
            return $size . " bytes";
        }
        $size = $size / 1024;
        if ($size < 1024) {
            return round($size) . " kB";
        }
        $size = $size / 1024;
        if ($size < 1024) {
            return round($size, 2) . " Mb";
        }
        $size = $size / 1024;
        if ($size < 1024) {
            return round($size, 2) . " Gb";
        }
        $size = $size / 1024;
        return round($size, 2) . " Tb";
    }

}
/**
 * Prüft, ob "/" hinten ist
 * @param $dir
 * @return string
 */
if (!function_exists("checkSlash")) {

    function checkSlash($dir)
    {
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

    function getRandomString($lenght = 10)
    {
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
 * @param string $InputString Input string
 * @param string $KeyPhrase Key phrase
 * @return    string    Encrypted string
 */
if (!function_exists("XOREncryption")) {

    function XOREncryption($InputString, $KeyPhrase)
    {
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

    function xorEnc($InputString, $KeyPhrase = NULL)
    {
        if ($KeyPhrase == null) {
            if (!session_id()) {
                die('error: no session! (xorEnc)');
            } else {
                $KeyPhrase = session_id();
            }
        }
        $InputString .= '';
        $InputString = XOREncryption($InputString, $KeyPhrase);
        $InputString = base64_encode($InputString);

        return $InputString;
    }

}
if (!function_exists("xorDec")) {

    function xorDec($InputString, $KeyPhrase = null)
    {
        if ($KeyPhrase == null) {
            if (!session_id()) {
                die('error: no session! (xorEnc)');
            } else {
                $KeyPhrase = session_id();
            }
        }

        $InputString .= '';
        $InputString = base64_decode($InputString);
        $InputString = XOREncryption($InputString, $KeyPhrase);

        return $InputString;
    }

}
if (!function_exists("_log")) {
    function _log($text)
    {
        if (!defined("_LOG_DIR")) {
            exit();
        }
        $logfile = _LOG_DIR . "/info.log";
        if (!file_exists($logfile)) {
            touch($logfile);
            shell_exec("chmod -R 0777 \"" . $logfile . "\"");
        }
        $logsize = filesize($logfile);
        if ($logsize > (1024 * 1024 * LOG_MAX_SIZE)) {
            rename($logfile, $logfile . "." . date("Ymd") . ".log");
            touch($logfile);
            shell_exec("chmod -R 0777 \"" . $logfile . "\"");
        }
        file_put_contents($logfile, "[" . date("Y-m-d H:i:s") . "]" . $text . "\n", FILE_APPEND);
    }

}
if (!function_exists("sslEnc")) {
    function sslEnc($string)
    {
        if (!session_id()) {
            die('error: no session! (sslEnc)');
        }
        return openssl_encrypt($string, "bf-ecb", session_id());
    }
}
if (!function_exists("sslDec")) {
    function sslDec($string)
    {
        if (!session_id()) {
            die('error: no session! (sslDec)');
        }
        return openssl_decrypt($string, "bf-ecb", session_id());
    }
}
if (!function_exists("precentageDisplayCli")) {
    /**
     * @param numeric $actual_ct The current state of the process, a counter, e.g., loop variable.
     * @param numeric $sum_ct The amount of 100%
     * @param bool $restult_to_return
     * @return mixed|void
     */
    function precentageDisplayCli($actual_ct, $sum_ct, $restult_to_return = false)
    {
        $w = round($this->_SCREEN / 2);
        $szazalek = round($actual_ct / $sum_ct * 100);
        $sz = floor($actual_ct / $sum_ct * ($w - 1));
        $m = $w - 1 - $sz;
        if ($restult_to_return) {
            return $restult_to_return;
        } else {
            "[\033[32m" . str_pad("#", $sz, "#") . ($szazalek == 100 ? "" : str_pad(" ", $m, " ")) . "\033[37m] \033[34m% " . $szazalek . "   \033[37m\r";
        }
    }
}
if (!function_exists("url")) {
    function url($url = null)
    {
        if (is_array($url)) {
            $ret = "";
            foreach ($url as $key => $value) {
                if (!empty($ret)) {
                    $ret .= "&";
                }
                if (is_array($value)) {
                    $value = serialize($value);
                }
                $ret .= $key . "=" . $value;
            }
            return xorEnc($ret);
        } elseif (!empty($url)) {
            return xorEnc($url);
        }

        $url = xorDec($_SERVER["QUERY_STRING"]);

        if (preg_match_all("/([0-9a-z_\-]+)=([0-9a-z_ \-:\{\}\"\;]+)/i", $url, $preg)) {
            foreach ($preg[1] as $index => $value) {
                $array = unserialize($preg[2][$index]);
                if (is_array($array)) {
                    $get[$value] = $array;
                } else {
                    $get[$value] = $preg[2][$index];
                }
            }
            return $get;
        }
        return [];
    }
}
if (!function_exists("sqlWhereFromSearchText")) {
    function sqlWhereFromSearchText($textToSearch, $cols)
    {
        if (!is_array($cols)) {
            $cols = [$cols];
        }
        $sql = " ( ";
        $szavak = explode(" ", trim($textToSearch));
        foreach ($cols as $i => $col) {
            if ($i > 0) {
                $sql .= " OR ";
            }
            $sql .= " ( ";
            foreach ($szavak as $c => $szo) {
                if ($c > 0) {
                    $sql .= " AND ";
                }
                $sql .= $col . " LIKE '%" . $szo . "%'";
            }
            $sql .= " ) ";
        }
        $sql .= " ) ";
        return $sql;
    }
}