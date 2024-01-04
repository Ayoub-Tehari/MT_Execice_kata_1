<?php
namespace User\MtExeciceKata1\temps;
class MomentInconnu extends MomentDeLaJournee {
    public function __construct (){
        parent::__construct(parent::INCONNU);
    }

}