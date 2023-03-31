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
            $this->exitWithError("Preencha todos os campos.");
        }

        if ($this->hasValidUid() == false) {
            $this->exitWithError("Usuário deve conter apenas letras, números, espaços, hífen e subtraço.");
        }

        if ($this->hasValidEmail() == false) {
            $this->exitWithError("Insira um e-mail válido.");
        }

        if ($this->passwordMatch() == false) {
            $this->exitWithError("Senhas inseridas não combinam.");
        }

        if ($this->userAlreadyExists()) {
            $this->exitWithError("Usuário ou e-mail já registrados.");
        }

        $this->setUser($this->uid, $this->password, $this->email);
        session_start();
        $_SESSION["signupError"] = "none";
        header("Location: /");
        exit();
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
