<?php
namespace User\MtExeciceKata1;
class VerificateurPalindrome {
    const BIENDIT = "Bien dit";
    public function renverser ($str) {
            
        if (strlen($str) <= 1) return $str;
    
        $newstr  = '';
        $str2arr = str_split($str,1);
        foreach ($str2arr as $word) {
            $newstr = $word.$newstr;
        }
    
        return $newstr;
    }
    public function verifier ($input){
        return "Bonjour" . PHP_EOL . $this->renverser($input) . PHP_EOL . $this::BIENDIT. PHP_EOL;
    }

}