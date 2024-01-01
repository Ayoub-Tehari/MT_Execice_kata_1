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
        QUAND on saisit une chaîne 
        ALORS « Au revoir » est envoyé en dernier
    */
    public function testAuRevoir () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = "Au revoir";
                $this->assertEquals($res_arr[count($res_arr)-2], $correction);
            }
        }
    }
    
}