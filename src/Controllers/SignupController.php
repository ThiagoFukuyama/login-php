<?php

namespace Source\Controllers;

class SignupController extends \Source\Models\Signup {

    private $uid;
    private $password;
    private $passwordRepeat;
    private $email;


    public function __construct($uid, $password, $passwordRepeat, $email) {
        $this->uid = $uid;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }


    public function signupUser() {
        if ($this->hasEmptyInput()) {
            header("Location: ../?error=emptyinput");
            exit();
        }

        if ($this->hasValidUid() == false) {
            header("Location: ../?error=invaliduid");
            exit();
        }

        if ($this->hasValidEmail() == false) {
            header("Location: ../?error=invalidemail");
            exit();
        }

        if ($this->passwordMatch() == false) {
            header("Location: ../?error=passwordnotmatch");
            exit();
        }

        if ($this->userAlreadyExists()) {
            header("Location: ../?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->password, $this->email);
    }


    private function hasEmptyInput() {
        return empty($this->uid) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email);
    }


    private function hasValidUid() {
        return preg_match("/^[a-zA-Z0-9 _-]*$/", $this->uid);
    }


    private function hasValidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }


    private function passwordMatch() {
        return $this->password == $this->passwordRepeat;
    }


    private function userAlreadyExists() {
        return $this->checkUser($this->uid, $this->email);
    }

}
