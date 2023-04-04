<?php

declare(strict_types=1);

namespace Source\Controllers;

class SignupController extends \Source\Models\Signup 
{

    private string $uid;
    private string $password;
    private string $passwordRepeat;
    private string $email;


    public function __construct(string $uid, string $password, string $passwordRepeat, string $email) 
    {
        $this->uid = htmlspecialchars($uid);
        $this->password = htmlspecialchars($password);
        $this->passwordRepeat = htmlspecialchars($passwordRepeat);
        $this->email = htmlspecialchars($email);
    }


    public function signupUser() : void
    {
        if ($this->hasEmptyInput()) {
            $this->exitWithError("Preencha todos os campos.");
        }

        if (!$this->hasValidUid()) {
            $this->exitWithError("Usuário deve conter apenas letras, números, espaços, hífen e subtraço.");
        }

        if (!$this->hasValidEmail()) {
            $this->exitWithError("Insira um e-mail válido.");
        }

        if (!$this->passwordMatch()) {
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


    private function hasEmptyInput() : bool
    {
        return empty($this->uid) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email);
    }


    private function hasValidUid() : int|bool
    {
        return preg_match("/^[a-zA-Z0-9 _-]*$/", $this->uid);
    }


    private function hasValidEmail() : mixed
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }


    private function passwordMatch() : bool
    {
        return $this->password == $this->passwordRepeat;
    }


    private function userAlreadyExists() : bool
    {
        return $this->checkUser($this->uid, $this->email);
    }

}
