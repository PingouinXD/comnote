<?php

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName = filter_var($_POST['fName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_ARGON2I); 


}

if(isset($_POST['signIn'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if ($result->num_rows > 0) {
        session_start();
        session_regenerate_id(true); 
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email']; 
        header("Location: homepage.php");
        exit();
    } 
}

?>