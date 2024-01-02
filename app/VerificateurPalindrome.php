<?php
namespace User\MtExeciceKata1;
use User\MtExeciceKata1\langues\Langue;
class VerificateurPalindrome {
    
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
        
        $langueInstance = Langue::getInstance();
        
        $expressions = $langueInstance->getData();
        $resultat = $expressions->Bonjour . PHP_EOL ;
        $reversed = $this->renverser($input);
        $resultat .= $reversed . PHP_EOL ;
        if ($reversed == $input){
            $resultat .= $expressions->BienDit . PHP_EOL;
        }
        $resultat .= $expressions->AuRevoir . PHP_EOL;
        return $resultat ;
    }

}