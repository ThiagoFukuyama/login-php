<?php

namespace Source\Controllers;

class LoginController extends \Source\Models\Login 
{

    private $uid;
    private $password;


    public function __construct($uid, $password) 
    {
        $this->uid = $uid;
        $this->password = $password;
    }


    public function loginUser() 
    {
        if ($this->hasEmptyInput()) {

            session_start();
            $_SESSION["loginError"] = "Preencha todos os campos.";
            header("location: ../");
            exit();

        }

        $this->getUser($this->uid, $this->password);
    }


    private function hasEmptyInput() 
    {
        return empty($this->uid) || empty($this->password);
    }
}
