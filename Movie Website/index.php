<?php
session_start();
$_SESSION['login']=FALSE;
$_SESSION['adminlogin']==FALSE; 
header("Location: home.php");

?>
<html>
<p>the page to redirected to after login</p>
</html>
