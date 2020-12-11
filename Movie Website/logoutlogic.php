<?php
require('db.php');
session_start();
$_SESSION['error']=8;
header("Location: errormessage.php");
?>
