<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css_2/css2.css">
</head>
<body>
<?php
require('db.php');
session_start();

if (isset($_POST['loginphonenumber'])){
	// removes backslashes
$loginphonenumber = stripslashes($_REQUEST['loginphonenumber']);
	//escapes special characters in a string
$loginphonenumber = mysqli_real_escape_string($con,$loginphonenumber);
$loginpassword = stripslashes($_REQUEST['loginpassword']);
$loginpassword = mysqli_real_escape_string($con,$loginpassword);
//Checking is user existing in the database or not

	$query = "SELECT * FROM `customer` WHERE phone='$loginphonenumber'
AND customer_password= '$loginpassword'";
$result = mysqli_query($con,$query) or die(mysql_error());

$rows = mysqli_num_rows($result);

	if($rows!=0){
	$_SESSION['phonenumber'] = $loginphonenumber;
	$_SESSION['login']=TRUE;
	   // Redirect user to index.php
	header("Location: home.php");
	 }else{
		 $_SESSION['error']=1;
		header("Location: errormessage.php");
}
}

    if (isset($_POST['singupphonenumber'])){
        // removes backslashes
$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
$name = mysqli_real_escape_string($con,$name); 
$singupphonenumber = stripslashes($_REQUEST['singupphonenumber']);
$singupphonenumber = mysqli_real_escape_string($con,$singupphonenumber);
$email = stripslashes($_REQUEST['email']);
$email = mysqli_real_escape_string($con,$email);
$signuppassword = stripslashes($_REQUEST['signuppassword']);
$signuppassword = mysqli_real_escape_string($con,$signuppassword);
$trn_date = date("Y-m-d H:i:s");
$query = "SELECT * FROM `customer` WHERE phone='$singupphonenumber'";
        $result = mysqli_query($con,$query);
        
	if(mysqli_num_rows($result)==0){
		
		$query = "INSERT into `customer` (customer_name,phone,email,customer_password,trn_date)
	VALUES ('$name','$singupphonenumber','$email','$signuppassword', '$trn_date')";
			$result = mysqli_query($con,$query);
			if($result){
				echo "<div class='form'>
	<h3>You are registered successfully.</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";
	$_SESSION['phonenumber'] = $singupphonenumber;
	$_SESSION['login']=TRUE;
	header("Location: home.php");
			}
			
           // Redirect user to index.php
	    

	}elseif(mysqli_num_rows($result)!=0){
		$_SESSION['error']=2;
		header("Location: errormessage.php");
			}
		}
        
?>
<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<form name="login" action="" method="post">
					<div class="group">
						<label for="loginphonenumber" class="label">Phone Number</label>
						<input name="loginphonenumber" type="number" class="input">
					</div>
					<div class="group">
						<label for="loginpassword" class="label">Password</label>
						<input name="loginpassword" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Forgot Password?</a>
					</div>
					</form>
					
				</div>
				<div class="sign-up-htm">
				<form name="signup" action="" method="post">
				<div class="group">
						<label for="name" class="label">Name</label>
						<input name="name" type="text" class="input">
					</div>
					<div class="group">
						<label for="singupphonenumber" class="label">Phone Number</label>
						<input name="singupphonenumber" type="number" class="input">
					</div>
					<div class="group">
						<label for="email" class="label">Email Address</label>
						<input name="email" type="text" class="input">
					</div>
					<div class="group">
						<label for="signuppassword" class="label">Password</label>
						<input name="signuppassword" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign Up">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">Already Member?</a>
					</div>

				</form>
					
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>