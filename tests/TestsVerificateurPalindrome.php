<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
class TestsVerificateurPalindrome extends TestCase
{
    //inputs


    /*
        QUAND on saisit une chaîne
        ALORS celle-ci est renvoyée en miroir
    */
    public function testMiroireDePalindrome () {
        $inputs = array("palindromes" => array("radar", "abba"),
                            "autres" => array("test", "palindrome"));

        $verificateur = new VerificateurPalindrome();
        foreach($inputs["palindromes"] as $data){
            $resultat = $verificateur->renverser($data);
            $this->assertEquals($resultat, $data);
        }
    }
}