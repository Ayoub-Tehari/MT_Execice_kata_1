<?php
namespace User\MtExeciceKata1\temps;
abstract class MomentDeLaJournee {
    private $representation;
    const MATIN = "matin";
    public function __construct ($moment){
        $this->representation = $moment;
    }
    public function toString () {
        return $this->representation;
    }
}