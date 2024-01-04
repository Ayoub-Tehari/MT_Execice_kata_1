<?php
namespace User\MtExeciceKata1;
use User\MtExeciceKata1\langues\Langue;
use User\MtExeciceKata1\langues\LangueFrancaise;
class VerificateurPalindromeBuilder {

    private $langue;

    public function __construct () {
        $this->langue = new LangueFrancaise ();
    } 

    public static function parDefault () {
        $builder =  new VerificateurPalindromeBuilder();
        return $builder->build();
    } 
    public function ayantCommeLangue ($langue){
        $this->langue = $langue;
        return $this;
    }
    public function AyantPourMomentDeLaJournee ($moment){
        
        return $this;
    }

    public function build() {
        return new VerificateurPalindrome($this->langue);
    }

}