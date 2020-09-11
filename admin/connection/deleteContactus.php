<?php
session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.html');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    header('location: ../auth/login.html');
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=0;
    if (isset($_POST['id'])){
        $id=$_POST['id'];
    }
    include 'connect.php';
    $conn = OpenCon();
    $sql = "DELETE FROM contacts  WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $age = array("msg"=>"ok");
        echo json_encode($age);
    } else {
        echo "error";
    }


}else{
    echo "not get";
}
?>