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
        QUAND on saisit un palindrome 
        ALORS celui-ci est renvoyé 
        ET « Bien dit » est envoyé ensuite
    */
    public function testBienDit () {

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["palindromes"] as  $data){
            $resultat = $verificateur->verifier($data);
            $correction = strrev($data) . PHP_EOL . "Bien dit" . PHP_EOL;
            $this->assertEquals($resultat, $correction);
        }
    }
    
    
    
}