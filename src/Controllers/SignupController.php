<?php

namespace Source\Controllers;

class SignupController extends \Source\Models\Signup 
{

    private $uid;
    private $password;
    private $passwordRepeat;
    private $email;


    public function __construct($uid, $password, $passwordRepeat, $email) 
    {
        $this->uid = $uid;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }


    public function signupUser() 
    {
        if ($this->hasEmptyInput()) {
            session_start();
            $_SESSION["signupError"] = "Preencha todos os campos.";
            header("location: ../");
            exit();
        }

        if ($this->hasValidUid() == false) {
            session_start();
            $_SESSION["signupError"] = "Usuário deve conter apenas letras, números, espaços, hífen e subtraço.";
            header("location: ../");
            exit();
        }

        if ($this->hasValidEmail() == false) {
            session_start();
            $_SESSION["signupError"] = "Insira um e-mail válido.";
            header("location: ../");
            exit();
        }

        if ($this->passwordMatch() == false) {
            session_start();
            $_SESSION["signupError"] = "Senhas inseridas não combinam.";
            header("location: ../");
            exit();
        }

        if ($this->userAlreadyExists()) {
            session_start();
            $_SESSION["signupError"] = "Usuário ou e-mail já existem.";
            header("location: ../");
            exit();
        }

        $this->setUser($this->uid, $this->password, $this->email);
    }


    private function hasEmptyInput() 
    {
        return empty($this->uid) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email);
    }


    private function hasValidUid() 
    {
        return preg_match("/^[a-zA-Z0-9 _-]*$/", $this->uid);
    }


    private function hasValidEmail() 
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }


    private function passwordMatch() 
    {
        return $this->password == $this->passwordRepeat;
    }


    private function userAlreadyExists() 
    {
        return $this->checkUser($this->uid, $this->email);
    }

}
