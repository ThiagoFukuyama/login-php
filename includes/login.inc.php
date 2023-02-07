<?php

include "class-autoload.inc.php";

if (isset($_POST["submit"])) {

    // Pegando os dados
    $uid = $_POST["uid"];
    $password = $_POST["password"];


    // Instanciando classe SignupContr
    $signup  = new LoginContr($uid, $password); 


    // Rodando registro de usuário
    $signup->loginUser();

    
    // Voltando para a página inicial
    header("Location: ../index.php?error=none");

}
