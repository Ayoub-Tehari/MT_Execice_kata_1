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
    private function getBody ($input){
        
        $expressions = Langue::getInstance()->getLanguage();
        
        $reversed = $this->renverser($input);
        
        $resultat = $reversed . PHP_EOL;

        if ($reversed == $input){
            $resultat .= $expressions->BienDit . PHP_EOL;
        }
        return $resultat;
    }
    public function verifier ($input){
        
        $resultat = $this->langue->direBonjour() ;
        $resultat .= $this->getBody($input) ;
        $resultat .= $this->direAuRevoir() ;

        return $resultat ;
    }
    
    private function direBonjour(){
        
        $expressions = Langue::getInstance()->getLanguage();
        $resultat = $expressions->Bonjour . PHP_EOL ;

        return $resultat;

    }

    private function direAuRevoir(){

        $expressions = Langue::getInstance()->getLanguage();
        $resultat = $expressions->AuRevoir . PHP_EOL ;

        return $resultat;

    }

}