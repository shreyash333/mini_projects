<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
    .selectheader{
	color: red;
	text-align: center;
}

.Confirmsection{
	margin-top: 50px;

}

.form__input {
	font-family: 'Roboto', sans-serif;
	color: #333;
	font-size: 1.2rem;
	  margin: 0 auto;
	padding: 1rem 1rem;
	border-radius: 0.2rem;
	background-color: rgb(255, 255, 255);
	border: none;
	width: 80%;
	
	display: block;
	border-bottom: 0.3rem solid transparent;
	transition: all 0.3s;
	
  }
</style>
<head>
    <title>Movie Website</title>
    <link rel="stylesheet" href="Exp3.CSS">
    
</head>
<body class="mainbody">
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
require('db.php');
session_start();
if ($_SESSION['testcomplete'] == 'yes') {
    header("Location:home.php");
  }
$query = "SELECT * FROM `movie` WHERE `movie_id`=".$_SESSION['movie_id'];
$result = mysqli_query($con,$query);
$moviedetail = mysqli_fetch_array($result,MYSQLI_ASSOC);
$moviename = $moviedetail['movie_name'];
$movietype = $moviedetail['movie_type'];
$movieduration = $moviedetail['duration'];
$movierating = $moviedetail['movie_rating'];
$moviedirector = $moviedetail['director'];
$moviestars = $moviedetail['stars'];
if (isset($_POST['confirm'])){
    
    
        header("Location: payment.php");
    
    
    }

?>
    
    <section class="Confirmsection" id="Confirmsection">
        <div class="max-width">
            <div style="display: inline-flex;">
                <button class="button " style="margin-left: 100px;" onclick="goBack()">
                    < Go Back </button>
                        <h2 class="mainheader"
                            style="align-content: center; font-size: 40px; padding-left: 70px; padding-bottom: 30px;">
                            Confirm Your Booking</h2>
            </div>
        <form action="" name="confirm" method="POST">
        <div class="bill-content">
                
                <br>
                
                <br>
                <br><br>
                <div style="padding-left: 500px;">
                    <div style="display: inline-flex;">
                        <div>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Movie Name </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Movie Type </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Duration </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">IMDB Rating </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Director </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Stars </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Show Date </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Show Time </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Number of Seats </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;">Seat Numbers </h1>
                        </div>
                        <div style="padding-left: 50px;">
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"> : </h1>
                        </div>
                        
                        <div style="padding-left: 100px;">
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $moviename?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $movietype?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $movieduration?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $movierating?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $moviedirector?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $moviestars?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $_SESSION['showdate']?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $_SESSION['timebox']?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $_SESSION['noSeats']?></h1>
                            <h1 class="billcon" style="font-size: 25px; color: white;"><?php echo $_SESSION['seatnumber']?></h1>
                            

                        </div>
                       
                    </div>
                    
                </div>
                <div style="padding-left: 500px; padding-top: 10px;">
                    <p style="color: white;   
              font-size: 18px;">Each Seat Cost Rs100 with no snacks.</p>
                        
  
                    </div>
                    <div style="display: inline-flex; padding-left: 500px;">
                        <div>
                            <h1 class="selectheader" style="font-size: 30px;">Total Amount</h1>
                        </div>
                        <div style="padding-left: 50px;">
                            <h1 class="selectheader" style="font-size: 30px;"> : </h1>
                        </div>

                        <div style="padding-left: 100px;">
                            <h1 class="selectheader" style="font-size: 30px;"><?php echo $_SESSION['noSeats']." * 100 = ".$_SESSION['amount']?></h1>
                        </div>
                        
                    </div>   
            </div>
            </div>
            
            <button class="button " style="margin-left: 690px; margin-top:70px ;" name="confirm">
                Confirm </button>
            </div>
        </form>
           
        </div>
    </section>
</body>
</html>
