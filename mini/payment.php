<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
    .selectheader{
	color: red;
	text-align: center;
}

.paymentsection{
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
<?php

require('db.php');
session_start();
if ($_SESSION['testcomplete'] == 'yes') {
    header("Location:home.php");
  }
if (isset($_POST['payment'])){
    $query = "SELECT * FROM `customer` WHERE `phone`=".$_SESSION['phonenumber'];
    $result = mysqli_query($con,$query);
    $customer = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $trn_date = date("Y-m-d H:i:s");
    $_SESSION['trn_date'] = $trn_date;
    echo $customer['customer_id'].",".$_SESSION['movie_id'].",".$_SESSION['noSeats'].",".$_SESSION['seatnumber'].",".$_SESSION['amount'].",".$_SESSION['showdate'].","."'".$_SESSION['timebox']."'".",".$trn_date;
    $pquery = "INSERT into `booking` (customer_id,movies_id,num_of_seat,seat_no,amount,show_date,show_time,trn_date)
	VALUES (".$customer['customer_id'].",".$_SESSION['movie_id'].",".$_SESSION['noSeats'].","."'".$_SESSION['seatnumber']."'".",".$_SESSION['amount'].","."'".$_SESSION['showdate']."'".","."'".$_SESSION['timebox']."'".","."'".$trn_date."'".")";
    $presult = mysqli_query($con,$pquery) or die(mysqli_error($con));
    var_dump($presult);
    if($presult){
        header("Location: Done.php");
    }else{
        
    }
    
    }

?>

<section class="paymentsection" id="paymentsection">
        <div class="max-width">
            <div style="display: inline-flex;">
                <button class="button " style="margin-left: 100px;">
                    < Go Back </button>
                        <h2 class="mainheader"
                            style="align-content: center; font-size: 40px; padding-left: 70px; padding-bottom: 50px;">
                            Make payment</h2>
            </div>
        <form action="" name="payment" method="POST">
        <div class="about-content">
                <div >
                    <div>
                        <h2 class="selectheader">Enter your Card Number</h2>
                    </div>
                    
                    <div class="field" style="display: inline-flex;">
                        <input type="text" style="margin-left: 550px; padding-left: 100px; padding-right: 100px;" class="form__input" id="noSeats" placeholder="XXXX XXXX XXXX XXXX" required="" />
  
                    </div>
                </div>
              <br>
                
                <div>
                    <h2 class="selectheader"> Enter Expiry Month and Year</h2>
                </div>
            <div style="display: inline-flex; padding-left: 500px;">
                
                <div class="field">
                    <input type="text" class="form__input" id="noSeats" placeholder="MM" required="" />
  
                </div>
                <div class="field">
                    <input type="text" class="form__input" id="noSeats" placeholder="YYYY" required="" />
  
                </div>
            </div>
            <br>
            <br>
            <div >
                <div>
                    <h2 class="selectheader">Enter CVV</h2>
                </div>
                
            <div class="field" style="display: inline-flex; margin-left: 630px;">
               
                <div>
                    <input type="text" class="form__input" id="noSeats" placeholder="###" required="" />
                </div>
                
  
                
            </div>
            </div>
            
            <button class="button " style="margin-left: 690px; margin-top:70px ;" name="payment">
                Pay </button>
            </div>
        </form>
            
        </div>
    </section>



    



</body>
</html>
