<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
class TestsVerificateurPalindrome extends TestCase
{
    //inputs


    const INPUTS = array("palindromes" => array("radar", "abba"),
                    "autres" => array("test", "palindrome"));
    /*
        QUAND on saisit une chaîne
        ALORS celle-ci est renvoyée en miroir
    */
    public function testMiroireDePalindrome () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["palindromes"] as $data){
            $resultat = $verificateur->renverser($data);
            $this->assertEquals($resultat, $data);
        }
    }
    /*
        QUAND on saisit un palindrome 
        ALORS celui-ci est renvoyé 
        ET « Bien dit » est envoyé ensuite
    */
}