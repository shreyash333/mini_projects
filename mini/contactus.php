<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
.buttonbar{
        
        margin: 0%;
        padding-left: 550px;
</style>
<head>
    <title>Movie Website</title>
    <link rel="stylesheet" href="Exp3.CSS">
    
</head>
<body class="mainbody">
<?php
require('db.php');
session_start();
if($_SESSION['login']==TRUE){
    $logname = "Logout";
    $nextlogpage = 'logoutlogic.php';
}else{
    $logname = "Login";
    $nextlogpage = 'login.php';

}


if (isset($_POST['sendmessage'])){
    $sendername = $_REQUEST['sendername'];
    $senderemail = $_REQUEST['senderemail'];
    $messagesubject = $_REQUEST['messagesubject'];
    $mainmessage = $_REQUEST['mainmessage'];
    $trn_date = date("Y-m-d H:i:s");
    $pquery = "INSERT into `message` (sender_name,email,message_subject,main_message,trn_date)
	VALUES ('$sendername','$senderemail','$messagesubject','$mainmessage','$trn_date')";
    $presult = mysqli_query($con,$pquery) or die(mysqli_error($con));
    var_dump($presult);
    if($presult){
        $_SESSION['error']=3;
        header("Location: errormessage.php");
    }else{
        $_SESSION['error']=5;
        header("Location: errormessage.php");
    }
    
    }
?>
    
    <div>
        <nav class="navbar">
            <div style="margin: 0%; padding-top: 15px;">
                <h2 style="margin: 0%; display: inline-block; position: fixed; font-size: 50px; margin-left: 80px; color: white;">Movie-<span style="color: red;">HUB</span></h2>
            <ul class="buttonbar" >
                <li class="navlist"><a href="home.php"><button class="button">Home</button></a></li>
                <li class="navlist"><a href="bookinglogic.php"><button class="button">Bookings</button> </a></li>
                <li class="navlist"><a href="contactus.php"><button class="button">Contact Us</button> </a></li>
                <li class="navlist"><a href="aboutus.php"><button class="button">About Us</button> </a></li>
                <?php echo "<li class='navlist'><a href='".$nextlogpage."'><button class='button' name='log'>".$logname."</button> </a></li>" ?>
                
                
            </ul>
            </div>
            
        </nav>
    </div>
    
    <section class="contact" id="contact">
        <div class="max-width"> 
            <h2 class="mainheader" style="align-content: center; font-size: 40px; padding-left: 330px; padding-bottom: 50px;">Contact Us</h2>
            <div class="contact-content" style="display: flex;">
                <div class="columnleft" >
                    <h1 class="text" style="color: white;">Get in Touch</h1>
                    <p style="color: white; font-size: 15;">The traditional theatre business is slow from dying. While technology has increased in accessibility and effects, theatre productions still thrive. The top three theatre shows attended are Phantom of the Opera, Les Miserables, and Disney’s The Lion King. An estimated 40% of viewers love interactive theatre and more than half of viewers find it to be a great idea to stream live performances. The following list of theatre company names are compiled below from existing theatre productions and services.</p>
                    <br>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <p class="head">Manager Name</p>
                                <p class="sub-title">Shreyash Sanjay Singh</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <p class="head">Office Address</p>
                                <p class="sub-title">Ramniranjan Mall</span> Near Ghanshaym Park, Om Nagar, <br> Ambadi Road, Vasai West, <br> Palghar, Maharashtra - 401202, <br> India</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <p class="head">Email</p>
                                <p class="sub-title">shreyash@moviehub.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right" >
                    <h1 class="text" style="color: white; padding-bottom: 20px;">Message Us</h1>
                    <form action="" method="POST">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" name="sendername" placeholder="Name" required>
                            </div>
                            <br>
                            <div class="field email">
                                <input type="email" name="senderemail" placeholder="Email" required>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <input type="text" name="messagesubject" placeholder="Subject" required>
                        </div>
                        <br>
                        <div class="field textarea" style="height: 100px;">
                            <textarea style="height: 100px;" cols="30" rows="10" name="mainmessage" placeholder="Message.." required></textarea>
                        </div>
                        <br>
                        <div >
                            <button class="button" name="sendmessage">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</body>
</html>
