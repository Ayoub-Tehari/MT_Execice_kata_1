<?php
namespace User\MtExeciceKata1\App\Presentation;
require_once(realpath("."). DIRECTORY_SEPARATOR ."spl_autoload_register.php");

spl_autoload_register('myAutoloader');
use User\MtExeciceKata1\App\Infrastructure\Systeme;


use User\MtExeciceKata1\App\Domaine\VerificateurPalindrome;




$system = new Systeme();

$verificateur = new VerificateurPalindrome($system->getLang(), $system->getMoment());
$palindromeApp = new PalindromeApp($system, $system, $verificateur);
$palindromeApp->execute();