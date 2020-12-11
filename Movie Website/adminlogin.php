<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.css" />
<style>
body {
     font-family:Arial, Sans-Serif;
}
.clearfix:before, .clearfix:after{
     content: "";
     display: table;
}
.clearfix:after{
     clear: both;
}
a{
     color:#0067ab;
     text-decoration:none;
}
a:hover{
     text-decoration:underline;
}
.form{
	 padding-top: 60px;
	 padding-bottom: 100px;
	 padding-left:100px;
	 padding-right:30px;
	 color: white;
	 height:180px;
	 width:300px;
	 background-color:red;
	 margin: 0% auto;
	 border: 1px solid  red; 
     border-radius: 30px;
     
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 200px;
     border-radius: 2px;
     border: 1px solid #CCC;
     padding: 10px;
     color: #333;
     font-size: 14px;
     margin-top: 10px;
}
input[type='submit']{
     padding: 10px 25px 8px;
     color: red;
     background-color:   white;
     text-shadow: rgba(231,208,58,0.24) 0 1px 0;
     font-size: 16px;
     box-shadow: rgba(231,208,58,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     border: 1px solid  black; 
     border-radius: 2px;
     margin-top: 10px;
     cursor:pointer;
}
input[type='submit']:hover {
     background-color: f0df74;
}
</style>
</head>
<body style="
    background: rgba(0,0,0,0.4);
	background-image: url(bgpic2.jpg);">
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){
	// removes backslashes
$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
//Checking is user existing in the database or not

	$query = "SELECT * FROM `adminuser` WHERE username='$username'
AND admin_password= '$password'";
$result = mysqli_query($con,$query) or die(mysql_error());
var_dump($result);
$rows = mysqli_num_rows($result);

	if($rows!=0){
	$_SESSION['phonenumber'] = $loginphonenumber;
        // Redirect user to index.php
        $_SESSION['adminlogin']==true; 
	header("Location: adminhome.php");
	 }else{
		 $_SESSION['error']=1;
		header("Location: errormessage.php");
}

}else{
?>
<div style="padding-top: 180px">
<div class="form">

<h1>Admin Login</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Admin Username" required />
<input type="password" name="password" placeholder="Password" required />
<br><br>
<input type="submit" name="submit" value="Register" />
</form>
</div>
</div>

<?php } ?>
</body>
</html>
