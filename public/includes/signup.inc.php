<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\SignupController;

if (isset($_POST["submit"])) {

    $uid = htmlspecialchars($_POST["uid"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"]);
    $email = htmlspecialchars($_POST["email"]);

    $signup  = new SignupController($uid, $password, $passwordRepeat, $email); 

    $signup->signupUser();
    
}

header("Location: /");
exit();
