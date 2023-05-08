<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\SignupController;

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];

    $signup = new SignupController($uid, $password, $passwordRepeat, $email); 

    $signup->signupUser();
    
}

header("Location: ../");
exit();
