<?php
namespace User\MtExeciceKata1\temps;
abstract class MomentDeLaJournee {
    private $representation;
    const MATIN = "Matin";
    const APRESMIDI = "ApresMidi";
    const SOIR = "Soir";
    const SOIREE = "Soiree";
    const INCONNU = "Inconnu";
    public function __construct ($moment){
        $this->representation = $moment;
    }
    public function toString () {
        return $this->representation;
    }
}