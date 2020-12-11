<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="allcss.CSS" />
<head>
    <title>Movie Website</title>
    <link rel="stylesheet" href="Exp3.CSS">
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
      .buttonbar{
        
        margin: 0%;
        padding-left: 550px;
    </style>
</head>
<body class="mainbody">


<?php
require('db.php');
session_start();




$_SESSION['testcomplete'] = 'No';
$query = "SELECT * FROM `movie` WHERE `movie_id`=".$_SESSION['temp_movie'];
$result = mysqli_query($con,$query);
$moviedetail = mysqli_fetch_array($result,MYSQLI_ASSOC);
$moviename = $moviedetail['movie_name'];
$imgurl = $moviedetail['img_url'];
$moviedate = $moviedetail['release_date'];
$movietype = $moviedetail['movie_type'];
$movieduration = $moviedetail['duration'];
$movierating = $moviedetail['movie_rating'];
$moviedirector = $moviedetail['director'];
$moviestars = $moviedetail['stars'];
$movieviews = $moviedetail['views'];
$moviedesc = $moviedetail['description'];
$moviewriter = $moviedetail['writer'];

if (isset($_POST['moviedetails'])){
    $_SESSION['movie_id']=$_SESSION['temp_movie'];
    header("Location: select.php");
    }
?>
    <div>
        <nav class="navbar">
            <div style="margin: 0%; padding-top: 15px;">
                <h2 style="margin: 0%; display: inline-block; position: fixed; font-size: 50px; margin-left: 80px; color: white;">Movie-<span style="color: red;">HUB</span></h2>
            <ul class="buttonbar">
            <li class="navlist"><a href="home.php"><button class="button">Home</button></a></li>
                <li class="navlist"><a href="booking.php"><button class="button">Bookings</button> </a></li>
                <li class="navlist"><a href="contactus.php"><button class="button">Contact Us</button> </a></li>
                <li class="navlist"><a href="aboutus.php"><button class="button">About Us</button> </a></li>
                
            </ul>
            </div>
            
        </nav>
    </div>
    
    <section class="moviedetails" id="moviedetails">
        <div class="max-width"> 
            <div style="display: inline-flex;">
                <button class="button " style="margin-left: 100px;"> < Go Back </button>
                <h2 class="mainheader" style="align-content: center; font-size: 40px; padding-left: 150px; padding-bottom: 50px;"><?php echo $moviename?></h2>
            </div>
            <form action="" name="moviedetails" method="POST">
            <div class="about-content" >
                <div style="padding-top: 10px; display: flex;">
                    <div class="movieimagediv">
                        <?php
                    echo  "<img id = 'movieimg' class='movieimage' src="."'".$imgurl."' alt=''>"
                        ?>
                    </div>
                    <div class="movieinfo">
                        <p class="infostyle"><?php echo $movieduration." | ".$moviedate?><br>
                        <?php echo $movietype?><br>
                                IMDB rating : <?php echo $movierating?> <br>
                                Views : <?php echo $movieviews?><br>
                                <?php echo $moviedesc?><br> 
                                Director: <?php echo $moviedirector?> <br>
                                Writers:<?php echo $moviewriter?><br>
                                Stars: <?php echo $moviestars?> <br>
                         </p>
                         <br>
                         <button class="button " style="margin-bottom: 10px;" name="moviedetails">Book Now</button>
                        
                        
                    </div>
                </div>
            </form>
            
                
                
            </div>
        </div>
    </section>



</body>
</html>
