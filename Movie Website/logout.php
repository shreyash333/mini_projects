<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
    $_SESSION['phonenumber']="";
    $_SESSION['login']=FALSE;
// Redirecting To Home Page
header("Location: home.php");
}
?> 
