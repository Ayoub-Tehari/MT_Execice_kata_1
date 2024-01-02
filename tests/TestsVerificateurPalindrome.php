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
            $this->assertEquals(strrev($data), $res_arr[1]);
        
        }
    }   
    /*
        ETANT DONNE un utilisateur parlant la langue française
        QUAND on entre un palindrome
        ALORS il est renvoyé
        ET le <bienDit> de cette langue est envoyé
    */
    public function testBienDit_fr (){

        $langueInstance = Langue::getInstance();
        
        $langueInstance->setFile('fr.json');
        $expressions = $langueInstance->getData();
        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS['palindromes'] as $data){
            $resultat = $verificateur->verifier($data);
            $res_arr = explode(PHP_EOL, $resultat);
            $correction = $expressions->BienDit;
            $this->assertEquals($correction, $res_arr[2]);
            $this->assertEquals(strrev($data), $res_arr[1]);
        
        }
    }   
    /*
        ETANT DONNE un utilisateur parlant unea langue
        QUAND l'expression renvoyée est conforme à la langue choisit
    */
    public function testBienDitDesLangues (){

        $langueInstance = Langue::getInstance();
        
        $langueInstance->setFile('fr.json');
        $expressions = $langueInstance->getData();
        
        $this->assertEquals("Bien dit", $expressions->BienDit);

        
        $langueInstance->setFile('en.json');
        $expressions = $langueInstance->getData();
        $this->assertEquals("Well said", $expressions->BienDit);
    }   
    /*
        ETANT DONNE un utilisateur parlant la langue française
        QUAND on saisit un non palindrome 
        ALORS celui-ci est renvoyé 
        SANS « Bien dit » renvoyé ensuite
    */
    public function testNonPalindromeNonBienDit_fr () {
        
        $langueInstance = Langue::getInstance();
        $langueInstance->setFile('fr.json');
        $expressions = $langueInstance->getData();

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["autres"] as $data){
                $resultat = $verificateur->verifier($data);
                $res_len = strlen($resultat);
                $correction = strlen($expressions->Bonjour . PHP_EOL);
                $correction += strlen($data . PHP_EOL);
                $correction += strlen($expressions->AuRevoir . PHP_EOL);
                $this->assertEquals($res_len, $correction);
            
        }
    }
    /*
        ETANT DONNE un utilisateur parlant la langue anglaise
        QUAND on saisit un non palindrome 
        ALORS celui-ci est renvoyé 
        SANS « Bien dit » renvoyé ensuite
    */
    public function testNonPalindromeNonBienDit_en () {
        
        $langueInstance = Langue::getInstance();
        $langueInstance->setFile('en.json');
        $expressions = $langueInstance->getData();

        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS["autres"] as $data){
                $resultat = $verificateur->verifier($data);
                $res_len = strlen($resultat);
                $correction = strlen($expressions->Bonjour . PHP_EOL);
                $correction += strlen($data . PHP_EOL);
                $correction += strlen($expressions->AuRevoir . PHP_EOL);
                $this->assertEquals($res_len, $correction);
            
        }
    }
    
    /*
        ETANT DONNE un utilisateur parlant une langue
        QUAND on saisit une chaîne
        ALORS <bonjour> de cette langue est envoyé avant tout
    */
    public function testBonjour (){

        $langueInstance = Langue::getInstance();
        
        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                $langueInstance->setFile('fr.json');
                $expressions = $langueInstance->getData();
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = $expressions->Bonjour;
                $this->assertEquals($correction, $res_arr[0]);

                $langueInstance->setFile('fr.json');
                $expressions = $langueInstance->getData();
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = $expressions->Bonjour;
                $this->assertEquals(strrev($data), $res_arr[1]);
            }
        }
    } 
    /*
        ETANT DONNE un utilisateur parlant une langue
        QUAND on saisit une chaîne
        ALORS <auRevoir> dans cette langue est envoyé en dernier
    */
    
    public function testAuRevoir (){

        $langueInstance = Langue::getInstance();
        
        $verificateur = new VerificateurPalindrome();
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                $langueInstance->setFile('fr.json');
                $expressions = $langueInstance->getData();
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = $expressions->AuRevoir;
                $this->assertEquals($correction, $res_arr[count($res_arr)-2]);

                $langueInstance->setFile('en.json');
                $expressions = $langueInstance->getData();
                $resultat = $verificateur->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                $correction = $expressions->AuRevoir;
                $this->assertEquals($correction, $res_arr[count($res_arr)-2]);
            }
        }
    } 
}