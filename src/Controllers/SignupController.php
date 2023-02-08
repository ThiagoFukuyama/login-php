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

        if ($this->hasInvalidUid()) {
            header("Location: ../?error=invaliduid");
            exit();
        }

        if ($this->hasInvalidEmail()) {
            header("Location: ../?error=invalidemail");
            exit();
        }

        if (!$this->passwordMatch()) {
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
        $result;

        if (empty($this->uid) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function hasInvalidUid() {
        $result;

        if (!preg_match("/^[a-zA-Z0-9 _-]*$/", $this->uid)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function hasInvalidEmail() {
        $result;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function passwordMatch() {
        $result;

        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }


    private function userAlreadyExists() {
        $result;

        if (!$this->checkUser($this->uid, $this->email)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

}
