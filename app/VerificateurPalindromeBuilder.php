<?php
namespace User\MtExeciceKata1;
use User\MtExeciceKata1\langues\Langue;
use User\MtExeciceKata1\langues\LangueFrancaise;
use User\MtExeciceKata1\temps\MomentInconnu;
class VerificateurPalindromeBuilder {

    private $langue;
    private $moment;

    public function __construct () {
        $this->langue = new LangueFrancaise ();
        $this->moment = new MomentInconnu();
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
        $this->moment = $moment;
        return $this;
    }

    public function build() {
        return new VerificateurPalindrome($this->langue, $this->moment);
    }

}