<?php

function autoload($class){
    $file = $class . '.php';
    if (file_exists($file) == false)
    {
        return false;
    }
    include ($file);
}

spl_autoload_register('autoload');

?>