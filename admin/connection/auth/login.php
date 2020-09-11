<?php
session_start();

    if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        require_once('../connect.php');
        $conn = OpenCon();
        $sql = "CREATE TABLE IF NOT EXISTS users(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE,
            password VARCHAR(50) NOT NULL 
        )";
        if(mysqli_query($conn, $sql)){
        $password = md5($pass);//encrypt the password before saving in the database
        $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["email"] = $row['email'];
            $_SESSION["name"] = $row['name'];
            header("Location:../../home.php");
        } else {

            header("Location:../../auth/login.html");
        }
    }

  }
    else {
            echo "error";
        }


?>
