<?php
session_start();

include_once './includes/mysql-functions.php';
connect_db();

if (isset($_POST['username'],$_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($dblink,$username);
		$password = mysqli_real_escape_string($dblink,$password);
		
        // prepare query
        $sql = "SELECT password,salt FROM member WHERE username='".$username."'";

        //run the query
        $result =  query($sql);
        
        if(mysqli_num_rows($result)==0){
            header('location:index.php');
            exit();
        }
        
        $userData = mysqli_fetch_assoc($result);
        $hash = hash('sha1',$userData['salt'].hash('sha1',$password));
        
        if($hash ==$userData['password']){
            $_SESSION['username'] = $username;
            header('location:home.php?login=success');
        }else{
            header('location:index.php?login=fail');
        }
} 

?>