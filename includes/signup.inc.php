<?php

include "class-autoload.inc.php";

if (isset($_POST["submit"])) {

    // Pegando os dados
    $uid = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];


    // Instanciando classe SignupContr
    $signup  = new SignupContr($uid, $password, $passwordRepeat, $email); 


    // Rodando registro de usuário
    $signup->signupUser();

    
    // Voltando para a página inicial
    header("Location: ../index.php?error=none");

}
