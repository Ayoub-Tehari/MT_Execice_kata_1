<?php

namespace User\MtExeciceKata1\langues;
class LangueFrancaise extends LangueTemplate {
    public function __construct (){
        parent::__construct();
        $this->setLanguageFile("fr.json");
    }
}