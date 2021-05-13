<?php

function my_autoload ($pClassName) {

    $pastas = ['Models', 'Validators'];

    foreach($pastas as $pasta){
        $file = "src" . DIRECTORY_SEPARATOR . $pasta . DIRECTORY_SEPARATOR . $pClassName . ".php";
        
        if(file_exists($file)){
            include($file);
        }
    }
}

spl_autoload_register("my_autoload");