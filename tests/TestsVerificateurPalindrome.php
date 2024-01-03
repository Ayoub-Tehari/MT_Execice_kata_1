<?php

namespace User\MtExeciceKata1;
use PHPUnit\Framework\TestCase;
use User\MtExeciceKata1\langues\LangueFrancaise;
use User\MtExeciceKata1\langues\LangueAnglaise;
use User\MtExeciceKata1\langues\Langue;
class TestsVerificateurPalindrome extends TestCase
{
    //inputs


    const INPUTS = array("palindromes" => array("radar", "abba"),
                    "autres" => array("test", "palindrome"));
    
    
    
    /*
        QUAND on saisit une chaine
        ALORS "Bonjour" plus celle-ci est renvoyée en miroir
    
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
    
    public function testBienDit_en (){

        $langueInstance = Langue::getInstance();
        
        $langueInstance->setLanguageFile('en.json');
        $expressions = $langueInstance->getLanguage();
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
    *
    public function testBienDit_fr (){

        $langueInstance = Langue::getInstance();
        
        $langueInstance->setLanguageFile('fr.json');
        $expressions = $langueInstance->getLanguage();
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
        ETANT DONNE un utilisateur parlant une langue
        ALORS l'expression renvoyée est conforme à la langue choisit
    */
    public function testBienDitDesLangues (){

        $langue = new LangueFrancaise ();
        
        $this->assertEquals("Bien dit".PHP_EOL, $langue->direBienDit());

        $langue = new LangueAnglaise ();
        
        $this->assertEquals("Well said".PHP_EOL, $langue->direBienDit());
  
    }   
    /*
        ETANT DONNE un utilisateur parlant la langue française
        QUAND on saisit un non palindrome 
        ALORS celui-ci est renvoyé 
        SANS « Bien dit » renvoyé ensuite
    */
    public function testNonPalindromeNonBienDit () {
        
        $verificateur = new VerificateurPalindromeBuilder();
        $langueFr = new LangueFrancaise();

        $correction = Langue::getInstance()->setLanguageFile('fr.json')->getLanguage()->BienDit;
        
        foreach(self::INPUTS["autres"] as $data){
                $languageMock = $this->createMock(LangueFrancaise::class);
                $languageMock->expects($this->never())->method('direBienDit')->willReturn($correction.PHP_EOL);
                $resultat = $verificateur->ayantCommeLangue($languageMock)->build()->getBody($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals(strrev($data), $res_arr[0]);
                $this->assertEquals("", $res_arr[1]);
                $this->assertEquals(2, count($res_arr));

            
        }
    }
    /*
        ETANT DONNE un utilisateur parlant la langue anglaise
        QUAND on saisit un non palindrome 
        ALORS celui-ci est renvoyé 
        SANS « Bien dit » renvoyé ensuite
    */
    public function testBienDit () {
        
        $verificateur = new VerificateurPalindromeBuilder();
        $langueFr = new LangueFrancaise();

        $correction = Langue::getInstance()->setLanguageFile('fr.json')->getLanguage()->BienDit;
        
        foreach(self::INPUTS["palindromes"] as $data){
                $languageMock = $this->createMock(LangueFrancaise::class);
                $languageMock->expects($this->once())->method('direBienDit')->willReturn($correction.PHP_EOL);
                $resultat = $verificateur->ayantCommeLangue($languageMock)->build()->getBody($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals($data, $res_arr[0]);
                $this->assertEquals($correction, $res_arr[1]);

            
        }
        
    }
    
    /*
        ETANT DONNE un utilisateur parlant une langue
        QUAND on saisit une chaîne
        ALORS <bonjour> de cette langue est envoyé avant tout
    */
    public function testBonjour (){

        $verificateur = new VerificateurPalindromeBuilder();
        $langueFr = new LangueFrancaise();
        $langueStub = $this->createStub(LangueFrancaise::class);
        
        $correction = Langue::getInstance()->setLanguageFile('fr.json')->getLanguage()->Bonjour;
        $langueStub->method('direBonjour')
             ->willReturn($correction.PHP_EOL);
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                
                $resultat = $verificateur->ayantCommeLangue($langueStub)->build()->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals($correction, $res_arr[0]);

                $resultat = $verificateur->ayantCommeLangue($langueFr)->build()->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals($correction, $res_arr[0]);

            }
        }
    } 
    /*
        ETANT DONNE un utilisateur parlant une langue
        QUAND on saisit une chaîne
        ALORS <auRevoir> dans cette langue est envoyé en dernier
    */
    
    public function testAuRevoir (){
        $verificateur = new VerificateurPalindromeBuilder();
        $langueFr = new LangueFrancaise();
        $langueStub = $this->createStub(LangueFrancaise::class);
        
        $correction = Langue::getInstance()->setLanguageFile('fr.json')->getLanguage()->AuRevoir;
        $langueStub->method('direAuRevoir')
             ->willReturn($correction.PHP_EOL);
        foreach(self::INPUTS as $type){
            foreach($type as $key => $data){
                
                $resultat = $verificateur->ayantCommeLangue($langueStub)->build()->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals($correction, $res_arr[count($res_arr)-2]);

                $resultat = $verificateur->ayantCommeLangue($langueFr)->build()->verifier($data);
                $res_arr = explode(PHP_EOL, $resultat);
                
                
                $this->assertEquals($correction, $res_arr[count($res_arr)-2]);

            }
        }
    }
    
}