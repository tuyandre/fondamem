<?php
// Starting session
session_start();
// Removing session data
if(!isset($_SESSION["email"])){
    header("Location:../auth/index.html");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connection.php';
    $conn = OpenCon();

// Escape user inputs for security
    $oldpass=$_POST['oldpass'];
    $pass =  $_POST['password'];
    $confirm= $_POST['confirm'];
    $email=$_SESSION["email"];

    $user_check_query = "SELECT * FROM users WHERE email='$email' AND password='$oldpass' LIMIT 1";


    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        $id=$user['id'];
        $sql = "UPDATE users SET password='$pass' WHERE id='$id'";
        echo "<script>
                                    alert('Password updated');
                                    window.location.href='../pages/password.php';
                                    </script>";
    }else
    {
        echo "<script>
                                    alert('Incorrect oldPassword');
                                    window.location.href='../pages/password.php';
                                    </script>";
    }

// close connection
    mysqli_close($conn);
}




?>