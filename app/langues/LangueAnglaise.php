<?php

namespace User\MtExeciceKata1\langues;
class LangueAnglaise extends LangueTemplate {
    public function __construct (){
        parent::__construct();
        $this->setLanguageFile("en.json");
    }
}