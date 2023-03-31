<?php

include __DIR__ . "/../../vendor/autoload.php";

use Source\Controllers\LoginController;

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $password = $_POST["password"];

    $login  = new LoginController($uid, $password); 

    $login->loginUser();

    header("Location: ../loggedInPage.php");
    exit();

}

header("Location: ../");
exit();
