<?php
require("./database/db.php");
session_start();

//ensure session works and handle potential issues
if(session_status()!== PHP_SESSION_ACTIVE){
    die("session could not be started. check your php configuration");
}

//get the current script name to determine the page 
$current_page = basename(($_SERVER['PHP_SELF']));

//check if the user is logged in
if(isset($_SESSION["user"])&& !empty($_SESSION["user"])){
    $user = $_SESSION["user"];
    //echo $user;
}else{
    //only redirect if the current page is NOY the login page;
    if($current_page !== "Login.php"){
    header("Location: ./Login.php");
    exit();
    }
    $user = null;
}


?>