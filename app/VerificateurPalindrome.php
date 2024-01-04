<?php
namespace User\MtExeciceKata1;
use User\MtExeciceKata1\langues\Langue;
class VerificateurPalindrome {
    private $langue;
    public function __construct ($langue) {
        $this->langue = $langue;
    }
    public function renverser ($str) {
            
        if (strlen($str) <= 1) return $str;
    
        $newstr  = '';
        $str2arr = str_split($str,1);
        foreach ($str2arr as $word) {
            $newstr = $word.$newstr;
        }
    
        return $newstr;
    }
    public function getBody ($input){
        
        $reversed = $this->renverser($input);
        
        $resultat = $reversed . PHP_EOL;

        if ($reversed == $input){
            $resultat .= $this->langue->feliciter() . PHP_EOL;
        }
        return $resultat;
    }
    public function verifier ($input){
        
        $resultat = $this->langue->saluer() ;
        $resultat .= $this->getBody($input) ;
        $resultat .= $this->langue->acquiter() ;

        return $resultat ;
    }
    

}