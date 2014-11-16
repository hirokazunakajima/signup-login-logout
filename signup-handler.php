<?php
session_start();
if (isset($_SESSION['username'])) {
   $_SESSION['username']=array(); 
   session_destroy();
}

include_once './includes/mysql-functions.php';
connect_db();

if (isset($_POST['username'],$_POST['password'])) {
    
        $salt = generateRandomString();// generate random number, this will be used part of encryption
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($dblink,$username);
        $pass = mysqli_real_escape_string($dblink,$pass);
        
        $hashed_password = hash('sha1', $salt.hash('sha1', $pass));//encryption
        
        // If entered username is already existing, return error
        $sql = "SELECT username FROM member WHERE username='".$username."'";
        $result =  query($sql);
        if(mysqli_num_rows($result)>0){
            header('location:signup.php?error=existing');
            exit();
        }
        
        // prepare query with salt
        $sql = "INSERT INTO member (username,password,salt) VALUES ('".$username."','".$hashed_password."','".$salt."')";

        //run the query
        if (query($sql)) {
            header('location:home.php?signup=success');
        }else{
            header("location:signup.php?signup=fail");
        }
} 

function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>