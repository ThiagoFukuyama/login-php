<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\LoginController;

if (isset($_POST["submit"])) {

    // Pegando os dados
    $uid = $_POST["uid"];
    $password = $_POST["password"];


    // Instanciando classe SignupContr
    $signup  = new LoginController($uid, $password); 


    // Rodando registro de usuário
    $signup->loginUser();

    
    // Voltando para a página inicial
    header("Location: ../?error=none");

}

header("Location: ../");
exit();
