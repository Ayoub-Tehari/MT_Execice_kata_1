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
        ALORS celle-ci est renvoyée en miroir
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
        QUAND on saisit une chaîne 
        ALORS « Bonjour » est envoyé avant toute réponse
    */
    public function testBonjour () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = "Bonjour";
                $this->assertEquals($res_arr[0], $correction);
            }
        }
    }
    
}