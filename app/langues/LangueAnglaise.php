<?php

namespace User\MtExeciceKata1\langues;
class LangueAnglaise extends LangueTemplate {
    public function __construct (){
        super();
        $this->setLanguageFile("en.json");
    }
}