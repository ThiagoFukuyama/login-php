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
            $this->exitWithError("Preencha todos os campos.");
        }

        $this->getUser($this->uid, $this->password);
        header("Location: ../loggedInPage.php");
        exit();
    }


    private function hasEmptyInput() 
    {
        return empty($this->uid) || empty($this->password);
    }
}
