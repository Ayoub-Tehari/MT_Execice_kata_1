<?php
function myAutoloader($class_name)
{
    require_once realpath(".") . DIRECTORY_SEPARATOR  . str_replace('\\', DIRECTORY_SEPARATOR,substr_replace($class_name,"", 0,strlen("User\MtExeciceKata1\\"))) . '.php';
}