<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
class TestsVerificateurPalindrome extends TestCase
{
    //inputs


    const INPUTS = array("palindromes" => array("radar", "abba"),
                    "autres" => array("test", "palindrome"));
    /*
        QUAND on saisit un palindrome
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
        QUAND on saisit une chaîne autre qu'un palindrome
        ALORS celle-ci est renvoyée en miroir
    */
    public function testMiroireDeNonPalindrome () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["autres"] as $data){
            $resultat = $verificateur->renverser($data);

            $this->assertEquals($resultat, strrev($data));
        }
    }
    
    
}