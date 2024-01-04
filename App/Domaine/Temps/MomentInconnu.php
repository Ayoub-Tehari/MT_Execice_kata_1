<?php
namespace User\MtExeciceKata1\App\Domaine\Temps;
class MomentInconnu extends MomentDeLaJournee {
    public function __construct (){
        parent::__construct(parent::INCONNU);
    }

}