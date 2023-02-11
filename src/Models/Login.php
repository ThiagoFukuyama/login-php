<?php

namespace Source\Models;

class Login extends Dbh {
    
    protected function getUser($uid, $password) {
        $sql = "SELECT senha FROM usuarios WHERE usuario = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $uid))) {
            $stmt = NULL;
            header("location: ../?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            header("location: ../?error=usernotfound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll();

        $checkPassword = password_verify($password, $hashedPassword[0]["senha"]);
        
        if (!$checkPassword) {

            $stmt = NULL;
            header("location: ../?error=wrongpassword");
            exit();

        } elseif ($checkPassword) {

            $sql = "SELECT * FROM usuarios WHERE usuario = ? OR email = ? AND senha = ?";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array($uid, $uid, $password))) {
                $stmt = NULL;
                header("location: ../?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = NULL;
                header("location: ../?error=usernotfound");
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
