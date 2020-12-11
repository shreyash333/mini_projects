<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
.buttonbar{
        
        margin: 0%;
        padding-left: 550px;<style>
</style>


</style>
<head>
    <title>Movie Website</title>
    
    
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
    
    <section class="about" id="about">
        <div class="max-width"> 
            <h2 class="mainheader" style="align-content: center; font-size: 40px; padding-left: 330px; padding-bottom: 50px;">About Us</h2>
            <div class="about-content" >
                <div style="padding-top: 30px; display: flex;">
                    <div class="aboutimagediv">
                        <img class="aboutimage" src="about.jpg" alt="">
                    </div>
                    <div class="aboutsent">
                        
                        <p class="aboutustext">This company was started as a College Mini projects. Three students of Bachelors of Engineering studing from St. John College of Engineering and Management has worked on this project. Their names are Aditya Singh, Shreyash Singh, Ashwin Tiwari. This Project is a basic online movie ticket booking system which allow customer to book tickets. Moreover it also has a admin page to check all the bookings. This projects was made in 2020 for the mini project of 5 Semester B.E. This projects uses HTML5, CSS3, Javascript, Php, Mysql for Database and Jquery. This company was started as a College Mini projects. Three students of Bachelors of Engineering studing from St. John College of Engineering and Management has worked on this project. Their names are Aditya Singh, Shreyash Singh, Ashwin Tiwari. This Project is a basic online movie ticket booking system which allow customer to book tickets. Moreover it also has a admin page to check all the bookings. This projects was made in 2020 for the mini project of 5 Semester B.E. This projects uses HTML5, CSS3, Javascript, Php, Mysql for Database and Jquery. This company was started as a College Mini projects. Three students of Bachelors of Engineering studing from St. John College of Engineering and Management has worked on this project. Their names are Aditya Singh, Shreyash Singh, Ashwin Tiwari. This Project is a basic online movie ticket booking system which allow customer to book tickets. Moreover it also has a admin page to check all the bookings. This projects was made in 2020 for the mini project of 5 Semester B.E. This projects uses HTML5, CSS3, Javascript, Php, Mysql for Database and Jquery.</p>
                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>




</body>
</html>

