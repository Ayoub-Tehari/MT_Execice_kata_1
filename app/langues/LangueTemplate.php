<?php

namespace User\MtExeciceKata1\langues;
abstract class LangueTemplate {
    private $file; 
    private $data;    
    public function __construct() {
        
    }
    public function saluer () {
        return $this->data->Bonjour . PHP_EOL;
    }
    public function acquiter () {
        return $this->data->AuRevoir . PHP_EOL;
    }
    public function feliciter () {
        return $this->data->BienDit . PHP_EOL;
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