<?php

declare(strict_types=1);

namespace Source\Controllers;

class LoginController extends \Source\Models\Login 
{

    private string $uid;
    private string $password;


    public function __construct(string $uid, string $password) 
    {
        $this->uid = $uid;
        $this->password = $password;
    }


    public function loginUser() : void
    {
        if ($this->hasEmptyInput()) {
            $this->exitWithError("Preencha todos os campos.");
        }

        $this->getUser($this->uid, $this->password);
        header("Location: ../loggedInPage.php");
        exit();
    }


    private function hasEmptyInput() : bool
    {
        return empty($this->uid) || empty($this->password);
    }
}
