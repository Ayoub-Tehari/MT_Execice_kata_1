<?php
namespace User\MtExeciceKata1;
class VerificateurPalindrome {
    
    public function renverser ($input) {
        return $input;
    }
    public function epilog ($input){
        return $this->renverser($input) . PHP_EOL . "Bien dit";
    }

}