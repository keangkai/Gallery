<?php
    require 'db.inc.php';
    
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        
        if (empty($name) || empty($username) || empty($password) || empty($confirm_password)) {
            echo "<script type='text/javascript'>alert('Please complete form');";
            echo "location='../signup.php?signup=empty';</script>";
//            header("location: ../signup.php?signup=empty");
//            exit();
        } else {
            if ($password !== $confirm_password) {
                echo "<script type='text/javascript'>alert('Password not matched');";
                echo "location='../signup.php?signup=passwordIncorrect';</script>";
//                header("location: ../signup.php?signup=passwordIncorrect");
//                exit();
            } else {
                $sql = "SELECT * FROM login WHERE username=:username";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(":username", $username);
                $username = $_POST["username"];
                $stmt->execute();
                $row_count = $stmt->rowCount();
                if ($row_count > 0) {
                    echo "<script type='text/javascript'>alert('User already taken');";
                    echo "location='../signup.php?signup=usertaken';</script>";
//                    header("location: ../signup.php?signup=usertaken");
//                    exit();
                } else {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO login (name, username, password) VALUES (?, ?, ?)";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($name, $username, $hash_password));
                    header("location: ../index.php");
                    exit();
                }
            }
        }
    } else {
        header("location: ../signup.php");
        exit();
    }