<?php

namespace User\MtExeciceKata1\Tests;
use PHPUnit\Framework\TestCase;

use User\MtExeciceKata1\Tests\Utilities\VerificateurPalindromeBuilder;
use User\MtExeciceKata1\App\Domaine\Langues\LangueFrancaise;
use User\MtExeciceKata1\App\Domaine\Langues\LangueAnglaise;
use User\MtExeciceKata1\App\Domaine\Temps\Matin;
use User\MtExeciceKata1\App\Domaine\Temps\Soir;
use User\MtExeciceKata1\App\Domaine\Temps\Soiree as Nuit;

class TestsDeRecette extends TestCase
{

    /*
        Palindrome, anglais, soir
    */
    public function testPalindromeAnglaisSoir () {
        
        $verificateur = new VerificateurPalindromeBuilder();
        $langue_anglaise = new LangueAnglaise();
        $moment = new Soir () ;
        $resultat = $verificateur->ayantCommeLangue($langue_anglaise)
                                ->AyantPourMomentDeLaJournee($moment)
                                ->build()->verifier("radar");
        $correction = "Good evening" . PHP_EOL . "radar" . PHP_EOL . "Well said" . PHP_EOL ."Have a good evening" . PHP_EOL ; 
        $this->assertEquals($correction, $resultat);
        
    }

    /*
        Non-palindrome, français, matin.
    */
    public function testNonPalindromeFrancaisMatin()
    {
        $verificateur = new VerificateurPalindromeBuilder();
        $langue_anglaise = new LangueFrancaise();
        $moment = new Matin () ;
        $resultat = $verificateur->ayantCommeLangue($langue_anglaise)
                                ->AyantPourMomentDeLaJournee($moment)
                                ->build()->verifier("test");
        $correction = "Bonjour" . PHP_EOL . "tset" . PHP_EOL ."Bonne journée" . PHP_EOL ; 
        $this->assertEquals($correction, $resultat);
    }


    /*
        Palindrome, inconnue, nuit.
    */
    public function testPalindromeInconnueNuit()
    {
        $verificateur = new VerificateurPalindromeBuilder();
        $moment = new Nuit () ;
        $resultat = $verificateur->AyantPourMomentDeLaJournee($moment)
                                ->build()->verifier("otto");
        $correction = "Bon soirée" . PHP_EOL . "otto" . PHP_EOL . "Bien dit" . PHP_EOL ."Bonne nuit" . PHP_EOL ; 
        $this->assertEquals($correction, $resultat);
    }
   
}