<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\SignupController;

if (isset($_POST["submit"])) {

    // Pegando os dados
    $uid = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];


    // Instanciando classe SignupContr
    $signup  = new SignupController($uid, $password, $passwordRepeat, $email); 


    // Rodando registro de usuário
    $signup->signupUser();

    
    // Voltando para a página inicial
    session_start();
    $_SESSION["signupError"] = "none";
    header("Location: ../");
    exit();

}

header("Location: ../");
exit();

