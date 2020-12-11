<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
.buttonbar{
        
        margin: 0%;
        padding-left: 1050px;}

.bookingid{
	
	display: inline-flex;
}

.bookingcontent{
	
	background-color: red;
	height: 300px;
	width: 1200px;
	padding-left: 20px;
	padding-right: 20px;
	border: 1px solid black;
 border-radius: 30px;
 padding-top: 15px;
 
    margin: 0 auto;
	
}

.bookingdiv1{
	
	padding-left: 10px;
	margin: 0 auto;

}
.bookingdiv2{
padding-left: 60px;
margin: 0 auto;
}

.bookingdiv3{
	padding-left: 60px;
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

$bquery = "SELECT * FROM `booking`";
$bresult = mysqli_query($con,$bquery);
   

?>
    
    <div>
        <nav class="navbar">
            <div style="margin: 0%; padding-top: 15px;">
                <h2 style="margin: 0%; display: inline-block; position: fixed; font-size: 50px; margin-left: 80px; color: white;">Movie-<span style="color: red;">HUB</span></h2>
            <ul class="buttonbar" >
            <li class="navlist"><a href="adminhome.php"><button class="button">Home</button></a></li>
                <li class="navlist"><a href="adminmessage.php"><button class="button">Messages</button> </a></li>
                
                
                
                
            </ul>
            </div>
            
        </nav>
    </div>
    
    <section class="" id="contact" style="padding-top: 120px;">

        <h1 class="bookingheading">All your Bookings are here</h1>
        <br>
        <?php
        while ($row = mysqli_fetch_assoc($bresult)) {
            $mquery = "SELECT * FROM `movie` WHERE `movie_id`=".$row['movies_id']."";
            $mresult = mysqli_query($con,$mquery);
    $movie = mysqli_fetch_array($mresult,MYSQLI_ASSOC);
    $cquery = "SELECT * FROM `customer` WHERE `customer_id`=".$row['customer_id']."";
            $cresult = mysqli_query($con,$cquery);
    $customer = mysqli_fetch_array($cresult,MYSQLI_ASSOC);
        echo"<br>
        <div class='bookingcontent'>
            
            <div class='bookingid'>
                
            <div class='bookingdiv1'>
            
                <h2 class='bookingtext'>Booking ID : <span class='bookingtextvalue'>".$row['booking_id']." </span> </h2>
                <h2 class='bookingtext'>Customer ID :  <span class='bookingtextvalue'>".$customer['customer_id']."</span></h2>
                <h2 class='bookingtext'>Customer Name :  <span class='bookingtextvalue'>".$customer['customer_name']."</span></h2>
                <h2 class='bookingtext'>Customer Phone :  <span class='bookingtextvalue'>".$customer['phone']."</span></h2>
                <h2 class='bookingtext'>Customer Email :  <span class='bookingtextvalue'>".$customer['email']."</span></h2>
                
                
                
            </div>
            <div class='bookingdiv2'>
            <h2 class='bookingtext'>Show Date :  <span class='bookingtextvalue'>".$row['show_date']."</span></h2>
                <h2 class='bookingtext'>Show Time :  <span class='bookingtextvalue'>".$row['show_time']."</span></h2>
                <h2 class='bookingtext'>Number of seats : <span class='bookingtextvalue'>".$row['num_of_seat']."</span></h2>
                <h2 class='bookingtext'>Seat Number : <span class='bookingtextvalue'>".$row['seat_no']."</span></h2>
                <h2 class='bookingtext'>Amount Paid : <span class='bookingtextvalue'>".$row['amount']."</span></h2>
                

            </div>
            <div class='bookingdiv3'>
                <h2 class='bookingtext'>Movie Name : <span class='bookingtextvalue'>".$movie['movie_name']."</span></h2>
                <h2 class='bookingtext'>Type : <span class='bookingtextvalue'>".$movie['movie_type']."</span></h2>
                <h2 class='bookingtext'>Duration : <span class='bookingtextvalue'>".$movie['duration']."</span></h2>
                <h2 class='bookingtext'>IMDB rating :<span class='bookingtextvalue'>".$movie['movie_rating']."</span></h2>
                <h2 class='bookingtext'>Booked On : <span class='bookingtextvalue'>".$row['trn_date']."</span></h2>

            </div>
        </div>
        </div>";
        }
        ?>
        <br>
        <br>
        
    </section>




</body>
</html>
