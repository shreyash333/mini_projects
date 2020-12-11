<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
    a:link {
        color: white;
      }
      /* visited link */
      a:visited {
        color: white;
      }
      /* mouse over link */
      a:hover {
        color: white;
      }
      /* selected link */
      a:active {
        color: white;
      }
      .selectheader{
	color: red;
	text-align: center;
}

.Done{
	margin-top: 100px;

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
if ($_SESSION['testcomplete'] == 'yes') {
    header("Location:home.php");
}
$query = "SELECT * FROM `booking` WHERE `trn_date`="."'".$_SESSION['trn_date']."'";
    $result = mysqli_query($con,$query);
    $booking = mysqli_fetch_array($result,MYSQLI_ASSOC);
$_SESSION['booking_id'] = $booking['booking_id'];
$mquery = "SELECT * FROM `movie` WHERE `movie_id`=".$booking['movies_id']."";
    $mresult = mysqli_query($con,$mquery);
    $movie = mysqli_fetch_array($mresult,MYSQLI_ASSOC);

if (isset($_REQUEST['booked'])){
    
    $_SESSION['trn_date']="";
    $_SESSION['showdate']="";
    $_SESSION['timebox']="";
    $_SESSION['noSeats']="";
    $_SESSION['seatnumber']="";
    $_SESSION['amount']="";
    $_SESSION['movie_id']="";
    $_SESSION['temp_movie']="";
    $_SESSION['testcomplete'] = 'yes';
    header("Location: home.php");

    }

?>

<section class="Done" id="Done">
        <div class="max-width">
            
            <form action="" name="booked" method="POST">
            <div>
                <h1 class="selectheader" style="font-size: 60px;">Your Ticket Booked Successfully!</h1>
            </div>
            <br>
            <div>
                <h1 class="selectheader" style="font-size: 50px; color: white;">Your Booking Id : <?php echo $booking['booking_id']?></h1>
                
            </div>
            <br>
            <br><br>
            <div>
                <h1 class="selectheader" style="font-size: 25px; color: white;">Movie Name : <?php echo $movie['movie_name']?></h1>
                <br>
                <h1 class="selectheader" style="font-size: 25px; color: white;">Show Date : <?php echo $booking['show_date']?></h1>
                <br>
                <h1 class="selectheader" style="font-size: 25px; color: white;">Show Time : <?php echo $booking['show_time']?></h1>
                <br>
                <h1 class="selectheader" style="font-size: 25px; color: white;">Number of Seats : <?php echo $booking['num_of_seat']?></h1>
                <br>
                <h1 class="selectheader" style="font-size: 25px; color: white;">Seat Numbers : <?php echo $booking['seat_no']?></h1>
            </div>
            <div style="text-align: center; padding-top: 20px;">
                <p style="color: white;   
         text-align: center; font-size: 18px;">Please Collect your tickrts from counter 30 Minutes prior the show.<br> Enjoy the movie well</p>
         <br>
                    <div style="display=inline-flex;">
                    <button class="button" name="booked">Home</button>
                    <button class="button" style="margin-left: 50px; "><a target = '_blank' href='receipt.php' style="text-decoration: none;" >View Receipt</a></button>
                    </div>
                    
                </div>
            
            </form>
        </div>
    </section>
    



</body>
</html>
