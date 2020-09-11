<?php
session_start();
$username = "";
$name = "";
$email    = "";
$errors = array();
include '../connect.php';
$conn = OpenCon();
$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL 
)";
if(mysqli_query($conn, $sql)){
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $name=$_POST['name'];
        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";


        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { // if user exists
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($pass);//encrypt the password before saving in the database

            $query = "INSERT INTO users (name, email, password) 
  			  VALUES('$name', '$email', '$password')";
            mysqli_query($conn, $query);
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "You are now logged in";
            header('location:../../home.php');
        }else{
            header("Location:../../auth/index.html");
        }
    }

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}



CloseCon($conn);
?>