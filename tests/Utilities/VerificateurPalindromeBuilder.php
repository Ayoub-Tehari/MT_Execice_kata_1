<?php
namespace User\MtExeciceKata1\Tests\Utilities;
use User\MtExeciceKata1\App\Domaine\VerificateurPalindrome;
use User\MtExeciceKata1\App\Domaine\Langues\Langue;
use User\MtExeciceKata1\App\Domaine\Langues\LangueFrancaise;
use User\MtExeciceKata1\App\Domaine\Temps\MomentInconnu;
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