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
}
    </style>
</head>

<body class="mainbody">
<script>
function head1(){
    document.write("<h1 class='mainheader'>Get your tickets book Now</h1>");
}
function head2(){
    document.write("<h2 class='secondheader'>Get amazing offers on group booking</h2>");
}

</script>
<?php
require('db.php');
session_start();
$_SESSION['adminlogin']=FALSE; 

if($_SESSION['login']==TRUE){
    $logname = "Logout";
    $nextlogpage = 'logoutlogic.php';
}else{
    $logname = "Login";
    $nextlogpage = 'login.php';

}




    if(isset($_REQUEST['movie1'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 001;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
    header("Location: errormessage.php");
        
        }
        
    }elseif(isset($_REQUEST['movie2'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 002;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
    header("Location: errormessage.php");
        
        }
    }
    elseif(isset($_REQUEST['movie3'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 003;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
            header("Location: errormessage.php");
        
        }
    }
    elseif(isset($_REQUEST['movie4'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 004;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
    header("Location: errormessage.php");
        
        }
    }
    elseif(isset($_REQUEST['movie5'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 005;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
            header("Location: errormessage.php");
        }
    }
    elseif(isset($_REQUEST['movie6'])){
        if($_SESSION['login']==TRUE){
            $_SESSION['temp_movie'] = 006;
        header("Location: moviedetails.php");
        }else{
            $_SESSION['error']=7;
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
    
    <div class="content">
        
        <section>
            <div class="section3" id="home">
                <div class="center">
                    <div style="text-align: center; padding-left: 300px; ">
                       <script>head1(); head2();</script> 
                    
                    </div>
                    
                    <div style="text-align: center; padding-top: 40px;">
                    <p style="color: white;   
             text-align: center; font-size: 22px;">We provide you all the latest movie with all the extra feature.<br> Please come and
                        enjoy our
                        services.</p>
                        
                        <button class="button" ><a style="text-decoration: none;" href="#movies">Check Movies</a> </button>
                    </div>

                </div>
            </div>
        </section>
        <section class="section2" id="movies">
            <h1 class="mainheader" style="font-size: 40px;">Trending Movies</h1>
            <h2 class="secondheader" style="font-size: 25px; ">Every thing you want is here</h2>
        </section>
        <section>
        <form action="" method="POST" name="selectmovie">
        <div class="section1">
                <h1>Trending Movies</h1>
                <div class="showmovie">
                    <!--cards -->

                    <div class="card">

                        <div class="image">
                            <img
                                src= "movie1.PNG">
                        </div>
                        <div class="title">
                            <h1 >
                                Kesari</h1>
                        </div>
                        <div class="des">
                            <p style="font-size: 12px;">2h 30min | 21 March 2019<br>
                               Action, Drama, History<br>
                               IMDB rating : 9.6 <br>
                               Views : 9684345 <br>
                               Based on an incredible true story of the Battle of <br> Saragarhi in which an army of 21 Sikhs fought against <br> 10,000 Afghans in 1897. <br>
                               Director: Anurag Singh <br>
                               Writers: Girish Kohli, Anurag Singh <br>
                               Stars: Akshay Kumar, Parineeti Chopra, etc <br>
                            </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie1">Book Now</button>
                        </div>
                    </div>
                    <!--cards -->


                    <div class="card">

                        <div class="image">
                            <img
                                src="movie2.PNG">
                        </div>
                        <div class="title">
                            <h1>
                                Mission Mangal</h1>
                        </div>
                        <div class="des">
                            <p style="font-size: 12px;">2h 10min | 15 August 2019 <br>
                               Drama, History<br>
                               IMDB rating : 8.9 <br>
                               Views : 8995644 <br>
                               Based on true events of the Indian Space Research <br> Organisation (ISRO) successfully launching <br> the Mars Orbiter Mission (Mangalyaan).<br>
                               Director: Jagan Shakti <br>
                               Writers: R. Balki, Saketh Kondiparthi <br>
                               Stars: Akshay Kumar, Vidya Balan, etc <br>
                            </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie2">Book Now</button>
                        </div>
                    </div>
                    <!--cards -->


                    <div class="card">

                        <div class="image">
                            <img src="movie3.PNG">
                        </div>
                        <div class="title">
                            <h1>
                                ChhiChhore</h1>
                        </div>
                        <div class="des">
                            <p style="font-size: 12px;">2h 23min | 6 September 2019<br>
                               Comedy, Drama<br>
                               IMDB rating : 9.0 <br>
                               Views : 8651254 <br>
                               A tragic incident forces Anirudh, a middle-aged man, to <br> take a trip down memory lane and reminisce his college <br> days along with his friends, who were labelled as losers. <br>
                               Director: Nitesh Tiwari <br>
                               Writers: Piyush Gupta, Nikhil Mehrotra <br>
                               Stars: Sushant Singh Rajput, Shraddha Kapoor, etc  <br>
                            </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie3">Book Now</button>
                        </div>
                    </div>

                     <!--cards -->

                     <div class="card">

                        <div class="image">
                            <img
                                src="movie4.PNG">
                        </div>
                        <div class="title">
                            <h1>
                                URI </h1>
                        </div>
                        <div class="des">
                            <p style="font-size: 12px;">2h 18min | 11 January 2019 <br>
                               Action, Drama, War <br>
                               IMDB rating : 8.5 <br>
                               Views : 4256212 <br>
                               Indian army special forces execute a covert operation, <br> avenging the killing of fellow army men at their <br> base by a terrorist group. <br>
                               Director: Aditya Dhar <br>
                               Writer: Aditya Dhar <br>
                               Stars: Vicky Kaushal, Paresh Rawal, etc <br>
                            </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie4">Book Now</button>
                        </div>
                    </div>

                     <!--cards -->

                     <div class="card">

                        <div class="image">
                            <img
                                src="movie5.PNG">
                        </div>
                        <div class="title">
                            <h1>
                                Super 30</h1>
                        </div>
                        <div class="des">
                            <p style="font-size: 12px;">2h 34min | 12 July 2019 <br>
                               Biography, Drama <br>
                               IMDB rating : 8.0 <br>
                               Views : 6254912 <br>
                               Based on the life of Patna-based mathematician <br> Anand Kumar who runs the famed Super 30 program <br> for IIT aspirants in Patna. <br>
                               Director: Vikas Bahl <br>
                               Writer: Sanjeev Dutta <br>
                               Stars: Hrithik Roshan, Mrunal Thakur, etc <br>
                            </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie5">Book Now</button>
                        </div>
                    </div>

                     <!--cards -->

                     <div class="card">

                        <div class="image">
                            <img
                                src="movie6.PNG">
                        </div>
                        <div class="title">
                            <h1>
                                Dream Girl</h1>
                        </div>
                        <div class="des">
                            
                            <p style="font-size: 12px;">2h 12min | 13 September 2019 <br>
                                Comedy, Romance<br>
                                IMDB rating : 7.5 <br>
                                Views : 4216862<br>
                                Rom-com Movie, directed by Raaj Shaandilyaa, stars <br> Ayushmann Khurrana who plays a 'dream girl'. In every <br> love story, there is always one trying to win the heart.<br> 
                                Director: Raaj Shaandilyaa <br>
                                Writers: Nirmaan Dsingh, Niket Pandey <br>
                                Stars: Ayushmann Khurrana, Nushrat Bharucha, etc <br>
                             </p>
                            <button class="button " style="margin-bottom: 10px;" name="movie6">Book Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
            
        </section>
        
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Movie-<span>HUB</span></h3>

				<p class="footer-links">
					<a href="#" class="link-1">Home</a>
					
					<a href="#">Rating</a>
				
					<a href="#">Pricing</a>
				
					<a href="#">About</a>
					
					<a href="#">Faq</a>
					
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Movie-Hub © 2020</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p style="font-size: 15px;"><span>Ramniranjan Mall</span> Near Ghanshaym Park, Om Nagar, <br> Ambadi Road, Vasai West, <br> Palghar, Maharashtra - 401202, <br> India</p>
				</div>
                <br>
				<div>
					<i class="fa fa-phone"></i>
					<p style="font-size: 15px;">+91 70303 456259 <br> +91 81495 63526</p>
                </div>
               

				<div>
					<i class="fa fa-envelope"></i>
					<p style="font-size: 15px;"><a href="mailto:support@company.com">support@moviehub.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					This company started in 2020. We provide new/ Old/ Most trending movies with snacks. 
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
    </div>



</body>

</html>
