<?php

class SignupContr extends Signup {

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
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        if ($this->hasInvalidUid()) {
            header("Location: ../index.php?error=invaliduid");
            exit();
        }

        if ($this->hasInvalidEmail()) {
            header("Location: ../index.php?error=invalidemail");
            exit();
        }

        if (!$this->passwordMatch()) {
            header("Location: ../index.php?error=passwordnotmatch{$this->password}{$this->passwordRepeat}");
            exit();
        }

        if ($this->userAlreadyExists()) {
            header("Location: ../index.php?error=useroremailtaken");
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
