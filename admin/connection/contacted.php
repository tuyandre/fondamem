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
include 'connect.php';
$conn = OpenCon();
$sql = "CREATE TABLE IF NOT EXISTS contacts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    names VARCHAR(120) NOT NULL,
    email VARCHAR(70) NOT NULL ,
    telephone VARCHAR(70) NOT NULL ,
    messages VARCHAR(50) NOT NULL,
    dates DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if(mysqli_query($conn, $sql)){
    $messages = array();

    $sql2 = "SELECT * FROM contacts ORDER BY id DESC ";

    $result=mysqli_query($conn,$sql2);
    // Fetch all
            $json=mysqli_fetch_all($result,MYSQLI_ASSOC);
            array_push($messages,$json);
            echo json_encode($json );
            mysqli_close($conn);

}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>