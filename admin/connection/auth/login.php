<?php
session_start();

    if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        require_once('../connect.php');
        $conn = OpenCon();
        $password = md5($pass);//encrypt the password before saving in the database
        $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["email"] = $row['email'];
            $_SESSION["name"] = $row['name'];
            header("Location:../../home.php");
        } else {

            header("Location:../../auth/index.html");
        }

  }
    else {
            echo "error";
        }


?>
