<?php
    session_start();

    if (isset($_POST["submit"])) {
        require 'db.inc.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (empty($username) || empty($password)) {
            header("location: ../index.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM login WHERE username=?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($username));
            $row_count = $stmt->rowCount();
            if ($row_count < 1) {
                header("location: ../index.php?login=error");
                exit();
            } else {
                if ($row = $stmt->fetch()) {
                    $hashedPwdCheck = password_verify($password, $row["password"]);
                    if ($hashedPwdCheck == false) {
                        header("location: ../index.php?login=error");
                        exit();
                    } else if ($hashedPwdCheck == true) {
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['name'] = $row["name"];
                        $_SESSION['username'] = $row["username"];
                        header("location: ../home.php");
                        exit();
                    }
                }
            }
        }
    } else {
        header("location: ../index.php");
        exit();
    }
