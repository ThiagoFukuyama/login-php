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
            session_start();
            $_SESSION["loginError"] = "Ocorreu um erro. Tente novamente mais tarde.";
            header("location: ../");
            exit();

        }

        if ($stmt->rowCount() == 0) {

            $stmt = NULL;
            session_start();
            $_SESSION["loginError"] = "Usuário ou senha inválidos.";
            header("location: ../");
            exit();

        }

        $hashedPassword = $stmt->fetchAll();

        $checkPassword = password_verify($password, $hashedPassword[0]["senha"]);
        
        if (!$checkPassword) {

            $stmt = NULL;
            session_start();
            $_SESSION["loginError"] = "Usuário ou senha inválidos.";
            header("location: ../");
            exit();

        } elseif ($checkPassword) {

            $sql = "SELECT * FROM usuarios WHERE usuario = ? OR email = ? AND senha = ?";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array($uid, $uid, $password))) {

                $stmt = NULL;
                session_start();
                $_SESSION["loginError"] = "Ocorreu um erro. Tente novamente mais tarde.";
                header("location: ../");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = NULL;
                session_start();
                $_SESSION["loginError"] = "Usuário ou senha inválidos.";
                header("location: ../");
                exit();

            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["userId"] = $user[0]["id"];
            $_SESSION["userUid"] = $user[0]["usuario"];
            $_SESSION["userEmail"] = $user[0]["email"];

        }

        $stmt = NULL;
    } 

}
