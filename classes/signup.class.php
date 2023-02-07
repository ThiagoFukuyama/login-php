<?php

class Signup extends Dbh {
    
    protected function setUser($uid, $password, $email) {
        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPassword, $email))) {
            $stmt = NULL;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = NULL;
    } 


    protected function checkUser($uid, $email) {
        $sql = "SELECT usuario FROM usuarios WHERE usuario = ? OR email = ?";

        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = NULL;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    } 

}
