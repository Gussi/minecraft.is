<?php

class log {
    private $log;
    public static $instance;
    
    public function __construct($file){
        $this->log = fopen($file, "a");
        self::instance = $this;
    }
    
    static public function info($msg) {
        self::instance->write("INFO : " . $msg);
    }
    
    static public function error($msg) {
        self::instance->write("ERROR : " . $msg);
    }

    public function write($entry){
        $format = sprintf("%s %s \n", date("Y-m-d H:i:s", mktime()), $entry);
        fwrite($this->log, $format);
    }

    public function __destruct(){
        fclose($this->log);
    }

}
