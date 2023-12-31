<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
class TestsCycle2 extends TestCase
{
    //inputs


    const INPUTS = array("palindromes" => array("radar", "abba"),
                    "autres" => array("test", "palindrome"));
    
    /*
        QUAND on saisit un palindrome 
        ALORS celui-ci est renvoyé 
        ET « Bien dit » est envoyé ensuite
    */
    public function testPalindromeEtBienDit () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["palindromes"] as $data){
            $resultat = $verificateur->epilog($data);
            $this->assertEquals($resultat, $data.PHP_EOL."Bien dit" );
        }
    }
    
}