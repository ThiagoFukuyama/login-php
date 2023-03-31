<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\SignupController;

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];

    $signup  = new SignupController($uid, $password, $passwordRepeat, $email); 

    $signup->signupUser();

    session_start();
    $_SESSION["signupError"] = "none";
    header("Location: ../");
    exit();

}

header("Location: ../");
exit();

