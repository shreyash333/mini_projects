<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<style>
   .table tbody tr td:not(:first-child) {
	border: 3px solid red;
	width: 0.7em;
	height:0.7em;
  }
  
  .table tbody tr td:first-child {
	font-weight:bold;
  }
  
  .table tr td:nth-child(5) {
	border:none!important;
  }

  .table tr td:nth-child(13) {
	border:none!important;
  }
  .table thead tr td:nth-child(5) {
	border:none!important;
  }
  .table thead tr td:nth-child(13) {
	border:none!important;
  }

  .table thead tr td{
	  color: red;
	  font-size: 25;
  }
  
  .table {
	border-spacing: 10px;
  }

.screen{
	margin-top: 20px;
	padding-top: 5px;
	height: 60px;
	width: 420px;
	background-color: red;
	text-align: center;
	margin-left: 35px;
}

.selectheader{
	color: red;
	text-align: center;
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
  
.timeradio{
	color: white;
}

.timebox{
	color: white;
}

.selecttime{
	padding-top: 30px;
	padding-left: 30px;
	display: inline-flex;
}

.selectright{
	padding-left: 200px;

}

.selectleft{
	padding-left: 125px;
}

.selection{
	margin-top: 50px;
}

</style>
<head>
    <title>Movie Website</title>
    <link rel="stylesheet" href="Exp3.CSS">
    
</head>
<body class="mainbody">
<script>
function myFunction() {
  
  
  document.write("<td></td>"); 
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");
  document.write("<td></td>");

   
  } 
</script>
<?php
session_start();
if ($_SESSION['testcomplete'] == 'yes') {
  header("Location:home.php");
}

if (isset($_REQUEST['selectseat'])){
  
  $showdate = $_REQUEST['showdate'];
  $_SESSION['showdate'] = $showdate;
  if(isset($_REQUEST['timeradio1'])){

  }elseif(isset($_REQUEST['timeradio1'])){
    $_SESSION['timebox'] = "9AM - 12AM";
  }
  elseif(isset($_REQUEST['timeradio2'])){
    $_SESSION['timebox'] = "11AM - 1PM";
  }
  elseif(isset($_REQUEST['timeradio3'])){
    $_SESSION['timebox'] = "2PM - 5PM";
  }
  elseif(isset($_REQUEST['timeradio4'])){
    $_SESSION['timebox'] = "3PM - 6pM";
  }
  elseif(isset($_REQUEST['timeradio5'])){
    $_SESSION['timebox'] = "5PM - 8PM";
  }
  elseif(isset($_REQUEST['timeradio6'])){
    $_SESSION['timebox'] = "7PM - 10PM";
  }
  elseif(isset($_REQUEST['timeradio7'])){
    $_SESSION['timebox'] = "9PM - 12PM";
  }
 
  
  $noSeats = $_REQUEST['noSeats'];
  $_SESSION['noSeats'] = $noSeats;
  $seatnumber = $_REQUEST['seatnumber'];
  $_SESSION['seatnumber'] = $seatnumber;
  $amount = $noSeats*100;
  $_SESSION['amount'] = $amount;

    header("Location: confirm.php");
    }

?>

<section class="selection" id="selection">
        <div class="max-width">
            <div style="display: inline-flex;">
                <button class="button " style="margin-left: 100px;">
                    < Go Back s</button>
                        <h2 class="mainheader"
                            style="align-content: center; font-size: 40px; padding-left: 100px; padding-bottom: 50px;">
                            Select your Seats</h2>
            </div>
            <form action="" name="selectseat" methoh='POST'>
            <div class="selectcontent" style="display: inline-flex;">
                <div class="selectleft">
                    <div>
                        <h2 class="selectheader">Please Select Show Date </h2>
                    </div>
                    <div>
                    <input class="form__input"  type="date" name="showdate" placeholder="select show date" min="2020-12-02" max="2020-12-10">
                    </div>
                    <br>
                    <br>
                    <div>
                        <h2 class="selectheader">Please select the show time</h2>
                    </div>
                    <div style="display: inline-flex;">
                        
                        <div class="selecttime">
                            <input type="radio" id="9" name="timeradio1" value="9AM - 12AM">
                            <label for="time" class="timebox" name="timebox">9AM - 12AM</label><br>
                        </div>
                        <div class="selecttime">
                            <input type="radio" id="9" name="timeradio2" value="11AM - 1PM">
                            <label for="time" class="timebox" name="timebox">11AM - 1PM</label><br>
                        </div>
                        <div class="selecttime">
                            <input type="radio" id="9" name="timeradio3" value="2PM - 5PM">
                            <label for="time" class="timebox" name="timebox">2PM - 5PM</label><br>
                        </div>
                        <div class="selecttime">
                            <input type="radio" id="9" name="timeradio4" value="3PM - 6pM">
                            <label for="time" class="timebox" name="timebox">3PM - 6pM</label><br>
                        </div>
                    </div>
                    
                    <div>
                        <div style="display: inline-flex;">
                        
                            <div class="selecttime">
                                <input type="radio" id="9" name="timeradio5" value="5PM - 8PM">
                                <label for="time" class="timebox" name="timebox">5PM - 8PM</label><br>
                            </div>
                            <div class="selecttime">
                                <input type="radio" id="9" name="timeradio6" value="7PM - 10PM">
                                <label for="time" class="timebox" name="timebox">7PM - 10PM</label><br>
                            </div>
                            <div class="selecttime">
                                <input type="radio" id="9" name="timeradio7" value="9PM - 12PM">
                                <label for="time" class="timebox" name="timebox">9PM - 12PM</label><br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="field">
                        <h2 class="selectheader">Enter Number of Seats</h2>
                        <input type="text" class="form__input" name="noSeats" placeholder="Number of Seats" required="" />
  
                    </div>
                </div>
                
                <div class="selectright">
                    <div>
                        <h2 class="selectheader">Please Enter Seat Numbers you want </h2>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <td></td>
                            <td><h3>1</h3></td>
                            <td><h3>2</h3></td>
                            <td><h3>3</h3></td>
                            <td></td>
                            <td><h3>4</h3></td>
                            <td><h3>5</h3></td>
                            <td><h3>6</h3></td>
                            <td><h3>7</h3></td>
                            <td><h3>8</h3></td>
                            <td><h3>9</h3></td>
                            <td><h3>10</h3></td>
                            <td></td>
                            <td><h3>11</h3></td>
                            <td><h3>12</h3></td>
                            <td><h3>13</h3></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color: red;">A</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">B</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">C</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">D</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">E</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;" >F</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">G</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="color: red;">H</td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td ></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                        </table>
    
                <div class="screen">
                    <h2 style="color: white;">Screen this Way</h2>
                </div>
                <br>
                    <br>
                <div class="field">
                    <input type="text" class="form__input" name="seatnumber" placeholder="Enter Seat Number" required="" />
                    
                <button class="button " style="margin-left: 300px; margin-top: 70px; margin-bottom: 70px;" name="selectseat" value="done">
                    Proceed </button>
                    
                </div>
                </div>
            </form>
            
        </div>
    </section>

   



</body>
</html>
