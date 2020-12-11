<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
.errormessage{
	background-color: red;
	height: 250px;
	width: 600px;
	padding-left: 20px;
	padding-right: 20px;
	border: 1px solid black;
 border-radius: 30px;
 padding-top: 20px;
 color: white;
	margin: 0 auto;
	text-align: center;
}

.erroroption{
	text-decoration: none;
	margin: 0%;
	height: 45px;
	width: 150px;
	font-size: 18px;
	font-weight: 600;
	color: red;
	background: ffb3b3;
	outline: none;
	cursor: pointer;
	border: 1px solid black;
	border-radius: 25px;

}

.mainsection{
    padding-top: 250px
}
</style>
<head>
    <title>Movie Website</title>
    <link rel="stylesheet" href="Exp3.CSS">
    
</head>
<body class="mainbody">
<?php
require('db.php');
session_start();
if ($_SESSION['error']==1){
    $str1 = "Opps! something went wrong";
    $str2 = "Password/ Phone number is Incorrect. Please Check";
    $buttonname = "Try again";
    $nextpage = 'login.php';
    }
    elseif ($_SESSION['error']==2){
        $str1 = "Opps! Phone Number Already Exist";
        $str2 = "Seems like you have already registered. Please Check";
        $buttonname = "Login";
        $nextpage = 'login.php';
        }
        elseif ($_SESSION['error']==3){
            $str1 = "Message Sent Successfully";
            $str2 = "Will contact you with in a week";
            $buttonname = "Okay";
            $nextpage = 'home.php';
            }
            elseif ($_SESSION['error']==4){
                $str1 = "Opps! Something went wrong";
                $str2 = "Your ticket in not booked. Please try again";
                $buttonname = "Book Now";
                $nextpage = 'home.php';
                }
                elseif ($_SESSION['error']==5){
                    $str1 = "Opps! Something went wrong";
                    $str2 = "Failed to send message. Please Try again";
                    $buttonname = "Try again";
                    $nextpage = 'contactus.php';
                    }
                    elseif ($_SESSION['error']==6){
                        $str1 = "opps! you are not Login";
                        $str2 = "To see your past bookings please login";
                        $buttonname = "Login";
                        $nextpage = 'login.php';
                        }
                        elseif ($_SESSION['error']==7){
                            $str1 = "opps! you are not Login";
                            $str2 = "To see movie details please login";
                            $buttonname = "Login";
                            $nextpage = 'login.php';
                            }
                            elseif ($_SESSION['error']==8){
                                $str1 = "You will be logout";
                                $str2 = "You wont able to book your tickets untill you log in";
                                $buttonname = "Okay";
                                $nextpage = 'Logout.php';
                                }
    if (isset($_POST['buttonclicked'])){
        header("Location:".$nextpage."");
    }
?>
<div class="mainsection">
<?php
    echo "<div class='errormessage'>
            <br>
          
            <h1 style='font-size: 40px;'>".$str1."</h1>
            <br>
            <h1 style='font-size: 25px;'>".$str2."</h1>
            <br>
           
            <form action='' method='POST'>
            <button class='erroroption' name=buttonclicked>".$buttonname."</button>
            </form>
            
            <br><br>
            
        </div>"
?>
</div>
    
</body>
</html>
