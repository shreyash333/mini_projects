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
	padding-left: 30px;
	padding-right: 20px;
	border: 1px solid black;
 border-radius: 30px;
 padding-top: 15px;
 
    margin: 0 auto;
	
}

.bookingdiv1{
	
	padding-left: 00px;
	margin: 0 auto;

}
.bookingdiv2{
padding-left: 250px;
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

$mquery = "SELECT * FROM `message`";
$mresult = mysqli_query($con,$mquery);
   

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

        <h1 class="bookingheading">All your Messages are here</h1>
        <br>
        <?php
        while ($row = mysqli_fetch_assoc($mresult)) {
            
        echo"<br>
        <div class='bookingcontent'>
            
            <div class='bookingid'>
                
            <div class='bookingdiv1'>
            
                <h2 class='bookingtext'>Message ID : <span class='bookingtextvalue'>".$row['message_id']." </span> </h2>
                
                <h2 class='bookingtext'>Sender Email :  <span class='bookingtextvalue'>".$row['email']."</span></h2>
                
                </div>  
                <div class='bookingdiv2'>
            
                
                <h2 class='bookingtext'>Sender Name :  <span class='bookingtextvalue'>".$row['sender_name']."</span></h2>
                <h2 class='bookingtext'>Sent on :  <span class='bookingtextvalue'>".$row['trn_date']."</span></h2>
                </div>  
                
        </div>
        <h2 class='bookingtext'>Subject :  <span class='bookingtextvalue'>".$row['message_subject']."</span></h2>
                <h2 class='bookingtext'>Message :  <span class='bookingtextvalue'>".$row['main_message']."</span></h2>
               
        </div>";
        }
        ?>
        <br>
        <br>
        
    </section>




</body>
</html>
