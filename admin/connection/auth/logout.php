<?php
// Starting session
session_start();

// Removing session data
if(isset($_SESSION["email"])){
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    session_destroy();
    header("Location:../../auth/login.html");
}
?>