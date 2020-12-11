<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
.buttonbar{
        
        margin: 0%;
        padding-left: 550px;}
.newbutton{
    background-color: black;
    text-decoration: none;
	margin: 0%;
	height: 45px;
	width: 150px;
	font-size: 18px;
	font-weight: 600;
	color: #ffb3b3;
	
	outline: none;
	cursor: pointer;
	border: 1px solid #cc0000;
	border-radius: 25px;

}
.bookingid{
	
	display: inline-flex;
}

.bookingcontent{
	
	background-color: red;
	height: 230px;
	width: 1200px;
	padding-left: 20px;
	padding-right: 20px;
	border: 1px solid black;
 border-radius: 30px;
 padding-top: 20px;
 
    margin: 0 auto;
	
}

.bookingdiv1{
	
	padding-left: 50px;
	margin: 0 auto;

}
.bookingdiv2{
padding-left: 100px;
margin: 0 auto;
}

.bookingdiv3{
	padding-left: 100px;
	margin: 0 auto;
	}

.bookingtextvalue{
	color: white;
}

.bookingheading{
	font-size: 50px;
	color: white;
	text-align: center;
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

if(isset($_REQUEST['receipt'])){
    $_SESSION['booking_id']=$_REQUEST['receipt'];
    $bquery = "SELECT * FROM `booking` WHERE `booking_id`=".$_SESSION['booking_id']."";
$bresult = mysqli_query($con,$bquery);
$booking = mysqli_fetch_array($bresult,MYSQLI_ASSOC);
$_SESSION['movie_id']=$booking['movies_id'];

header("Location: receipt.php");
}

if($_SESSION['login']==TRUE){
    $logname = "Logout";
    $nextlogpage = 'logoutlogic.php';
}else{
    $logname = "Login";
    $nextlogpage = 'login.php';

}

$query = "SELECT * FROM `customer` WHERE `phone`=".$_SESSION['phonenumber']."";
    $result = mysqli_query($con,$query);
    $customer = mysqli_fetch_array($result,MYSQLI_ASSOC);
$bquery = "SELECT * FROM `booking` WHERE `customer_id`=".$customer['customer_id']."";
$bresult = mysqli_query($con,$bquery);
   

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
    
    <section class="" id="contact" style="padding-top: 120px;">

        <h1 class="bookingheading">Your Bookings</h1>
        <br>
        
        <?php
        while ($row = mysqli_fetch_assoc($bresult)) {
            $mquery = "SELECT * FROM `movie` WHERE `movie_id`=".$row['movies_id']."";
            $mresult = mysqli_query($con,$mquery);
    $movie = mysqli_fetch_array($mresult,MYSQLI_ASSOC);
        echo"<br>
        <div class='bookingcontent'>
        <form action='', method='POST'>
            <div class='bookingid'>
            
            <div class='bookingdiv1'>
                <h2 class='bookingtext'>Booking ID : <span class='bookingtextvalue'>".$row['booking_id']." </span> </h2>
                <h2 class='bookingtext'>Amount Paid : <span class='bookingtextvalue'>".$row['amount']."</span></h2>
                <h2 class='bookingtext'>Show Date :  <span class='bookingtextvalue'>".$row['show_date']."</span></h2>
                <h2 class='bookingtext'>Booked On : <span class='bookingtextvalue'>".$row['trn_date']."</span></h2>

            </div>
            <div class='bookingdiv3'>
                <h2 class='bookingtext'>Movie Name : <span class='bookingtextvalue'>".$movie['movie_name']."</span></h2>
                <h2 class='bookingtext'>Type : <span class='bookingtextvalue'>".$movie['movie_type']."</span></h2>
                <h2 class='bookingtext'>Duration : <span class='bookingtextvalue'>".$movie['duration']."</span></h2>
                <h2 class='bookingtext'>IMDB rating :<span class='bookingtextvalue'>".$movie['movie_rating']."</span></h2>
            </div>
            <div class='bookingdiv2'>
                
                <h2 class='bookingtext'>Show Time :  <span class='bookingtextvalue'>".$row['show_time']."</span></h2>
                <h2 class='bookingtext'>Number of seats : <span class='bookingtextvalue'>".$row['num_of_seat']."</span></h2>
                <h2 class='bookingtext'>Seat Number : <span class='bookingtextvalue'>".$row['seat_no']."</span></h2>
                <button class='newbutton' name='receipt' value=".$row['booking_id'].">Receipt</button>

            </div>
            
        </div>
        </form>
        </div>";
        }
        ?>
        <br>
        <br>
        
    </section>




</body>
</html>
