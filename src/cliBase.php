<?php

namespace Pachel\Functions;
/**
 * Ez egy olyan osztály, amibe be van építve, hogy a script egy időben többször fusson le
 * Kifejezetten a CLI parancsokoz jó ez a fajta megoldás
 * @author Tóth László*
 */
abstract class cliBase
{
    private $_tmp_filename;

    public function __construct()
    {
        $this->tmp_check();
    }
    public function __destruct()
    {
        unlink($this->_tmp_filename);
    }
    private function tmp_check(){
        if(!defined("CLI_TMP")){
            throw new \Exception("CLI_TMP is not defined!");
        }
        if(!defined("CLI_WAIT_TIME_MIN")){
            throw new \Exception("CLI_WAIT_TIME_MIN is not defined!");
        }
        if(!is_dir(CLI_TMP)){
            mkdir(CLI_TMP,0777);
        }
        $this->_tmp_filename = CLI_TMP.basename(get_called_class()).".tmp";
        if(file_exists($this->_tmp_filename)){
            $atime = filemtime($this->_tmp_filename);
            if(time()-(CLI_WAIT_TIME_MIN*60)>$atime){
                file_put_contents($this->_tmp_filename,time());
                return;
            }
            throw new \Exception("A cli már fut!");
        }
        file_put_contents($this->_tmp_filename,time());
    }
}