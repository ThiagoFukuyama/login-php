<?php

spl_autoload_register("autoloader");

function autoloader($className) {
    $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $extension = ".class.php";
    $path;
    
    if (strpos($url, "includes")) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    $fullPath = $path . $className . $extension;
    
    if (!file_exists($fullPath)) {
        echo "Arquivo não encontrado: " . $fullPath;
        return false;
    }

    include_once $fullPath;
}
