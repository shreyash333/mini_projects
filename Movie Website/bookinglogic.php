<?php
require('db.php');
session_start();
if($_SESSION['login']==TRUE){
header("Location: booking.php");
}else{
    $_SESSION['error']=6;
    header("Location: errormessage.php");

}
?>
