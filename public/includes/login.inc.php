<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\LoginController;

if (isset($_POST["submit"])) {

    // Pegando os dados
    $uid = $_POST["uid"];
    $password = $_POST["password"];


    // Instanciando classe LoginController
    $login  = new LoginController($uid, $password); 


    // Rodando registro de usuário
    $login->loginUser();

    
    // Voltando para a página inicial
    header("Location: ../loggedInPage.php");
    exit();

}

header("Location: ../");
exit();
