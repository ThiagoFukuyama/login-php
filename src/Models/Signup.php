<?php

declare(strict_types=1);

namespace Source\Models;

class Signup extends Dbh 
{
    
    protected function setUser(string $uid, string $password, string $email) : void
    {
        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPassword, $email))) {
            $stmt = NULL;
            $this->exitWithError("Ocorreu um erro. Tente novamente mais tarde.");
        }

        $stmt = NULL;
    } 


    protected function checkUser(string $uid, string $email) : bool
    {
        $sql = "SELECT usuario FROM usuarios WHERE usuario = ? OR email = ?";

        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = NULL;
            $this->exitWithError("Ocorreu um erro. Tente novamente mais tarde.");
        }

        return $stmt->rowCount() > 0;
    } 

    protected function exitWithError(string $message) : void
    {
        session_start();
        $_SESSION["signupError"] = $message;
        header("location: ../");
        exit();
    }

}
