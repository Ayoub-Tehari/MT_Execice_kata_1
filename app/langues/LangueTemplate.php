<?php

namespace User\MtExeciceKata1\langues;
abstract class LangueTemplate {
    private $file; 
    private $data;    
    public function __construct() {
        
    }
    public function direBonjour () {
        return $this->data->Bonjour . PHP_EOL;
    }
    public function direAurevoir () {
        return $this->data->AuRevoir . PHP_EOL;
    }
    
    public function setLanguageFile($json_file)
    {
        $this->file = __DIR__ . "\\" . $json_file;
        $this->data = null; 
        $this->loadData();
    } 
    private function loadData() {
        if (!$this->data) {
            $jsonContent = file_get_contents($this->file);
            $this->data = json_decode($jsonContent);
        }
    }
}