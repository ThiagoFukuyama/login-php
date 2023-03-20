<?php

namespace Source\Models;

class Login extends Dbh 
{
    
    protected function getUser($uid, $password) 
    {
        $sql = "SELECT senha FROM usuarios WHERE usuario = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $uid))) {
            $stmt = NULL;
            $this->exitWithError("Ocorreu um erro. Tente novamente mais tarde");
        }

        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            $this->exitWithError("Usuário ou senha inválidos");
        }

        $hashedPassword = $stmt->fetchAll();

        $checkPassword = password_verify($password, $hashedPassword[0]["senha"]);
        
        if (!$checkPassword) {

            $stmt = NULL;
            $this->exitWithError("Usuário ou senha inválidos");
            
        } elseif ($checkPassword) {

            $sql = "SELECT * FROM usuarios WHERE usuario = ? OR email = ? AND senha = ?";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array($uid, $uid, $password))) {
                $stmt = NULL;
                $this->exitWithError("Ocorreu um erro. Tente novamente mais tarde");
            }

            if ($stmt->rowCount() == 0) {
                $stmt = NULL;
                $this->exitWithError("Usuário ou senha inválidos");
            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["userId"] = $user[0]["id"];
            $_SESSION["userUid"] = $user[0]["usuario"];
            $_SESSION["userEmail"] = $user[0]["email"];

        }

        $stmt = NULL;
    } 

    protected function exitWithError($message) 
    {
        session_start();
        $_SESSION["loginError"] = $message;
        header("location: ../");
        exit();
    }

}
