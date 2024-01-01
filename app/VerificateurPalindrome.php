<?php
namespace User\MtExeciceKata1;
class VerificateurPalindrome {
    const BIENDIT = "Bien dit";
    public function renverser ($input) {
        return strrev($input);
    }
    public function epilog ($input){
        return $this->renverser($input) . PHP_EOL . $this::BIENDIT;
    }

}