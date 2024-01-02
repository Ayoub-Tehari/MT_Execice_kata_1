<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
use User\MtExeciceKata1\langues\Langue;
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
        ETANT DONNE un utilisateur parlant la langue anglaise
        QUAND on entre un palindrome
        ALORS il est renvoyé
        ET le <bienDit> de cette langue est envoyé
    */
    public function testBienDit_en (){

        $langueInstance = Langue::getInstance();
        
        $langueInstance->setFile('en.json');
        $expressions = $langueInstance->getData();
        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS['palindromes'] as $data){
            $resultat = $verificateur->verifier($data);
            $res_arr = explode(PHP_EOL, $resultat);
            $correction = $expressions->BienDit;
            $this->assertEquals($correction, $res_arr[2]);
        
        }
    }   
}