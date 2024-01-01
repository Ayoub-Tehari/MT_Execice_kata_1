<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
class TestsVerificateurPalindrome extends TestCase
{
    //inputs


    const INPUTS = array("palindromes" => array("radar", "abba"),
                    "autres" => array("test", "palindrome"));
    /*
        QUAND on saisit une chaine
        ALORS "Bonjour" plus celle-ci est renvoyée en miroir
    */
    public function testMiroireDuneChaine () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
            
                $resultat = $verificateur->renverser($data);
                $this->assertEquals($resultat, strrev($data));
            }
        }
    }

    
    /*
        QUAND on saisit un non palindrome 
        ALORS celui-ci est renvoyé 
        SANS « Bien dit » renvoyé ensuite
    */
    public function testNonPalindromeNonBienDit () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["autres"] as $data){
                $resultat = $verificateur->verifier($data);
                $res_len = strlen($resultat);
                $correction = strlen($verificateur::BONJOUR . PHP_EOL);
                $correction += strlen($data . PHP_EOL);
                $this->assertEquals($res_len, $correction);
            
        }
    }
    
}