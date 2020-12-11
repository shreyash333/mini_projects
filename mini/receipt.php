<?php
//call the FPDF library
require('db.php');
session_start();
$cquery = "SELECT * FROM `customer` WHERE `phone`=".$_SESSION['phonenumber']."";
    $cresult = mysqli_query($con,$cquery);
    $customer = mysqli_fetch_array($cresult,MYSQLI_ASSOC);
    $bquery = "SELECT * FROM `booking` WHERE `booking_id`=".$_SESSION['booking_id']."";
    $bresult = mysqli_query($con,$bquery);
    $booking = mysqli_fetch_array($bresult,MYSQLI_ASSOC);
    $mquery = "SELECT * FROM `movie` WHERE `movie_id`=".$_SESSION['movie_id']."";
    $mresult = mysqli_query($con,$mquery);
    $movie = mysqli_fetch_array($mresult,MYSQLI_ASSOC);
require('fpdf182/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',26);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130 ,5,'',0,1);
$pdf->Cell(130 ,5,'Movie-HUB',0,1);
$pdf->SetFont('Arial','',1);
$pdf->Cell(130 ,5,'',0,1);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'Ramniranjan Mall Near Ghanshaym Park, Om Nagar,',0,1);

$pdf->Cell(130 ,5,'Ambadi Road, Vasai West, Palghar, Maharashtra - 401202, India ',0,1);

$pdf->Cell(130 ,5,'Phone : +91 70303 456259 / +91 81495 63526' ,0,1);


$pdf->Cell(130 ,5,'Email : support@moviehub.com',0,1);

$pdf->Cell(130 ,5,'',0,1);
$pdf->Line(10, 50, 200, 50);
$pdf->Cell(130 ,5,'',0,1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130 ,5,'RECEIPT',0,1);
$pdf->Cell(130 ,5,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,'Customer Details :',0,1);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Customer ID : '.$customer['customer_id'],0,1);

$pdf->Cell(130 ,5,'Name : '.$customer['customer_name'],0,1);

$pdf->Cell(130 ,5,'Phone : '.$customer['phone'],0,1);

$pdf->Cell(130 ,5,'Email : '.$customer['email'],0,1);



$pdf->Cell(130 ,5,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,'Movie Details :',0,1);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Movie Name : '.$movie['movie_name'],0,1);

$pdf->Cell(130 ,5,$movie['duration']." | ".$movie['release_date'],0,1);

$pdf->Cell(130 ,5,$movie['movie_type'],0,1);

$pdf->Cell(130 ,5,'IMDB rating : '.$movie['movie_rating'],0,1);

$pdf->Cell(130 ,5,'Views : '.$movie['views'],0,1);

$pdf->Cell(130 ,5,'Director: '.$movie['director'],0,1);

$pdf->Cell(130 ,5,'Writer: '.$movie['writer'],0,1);

$pdf->Cell(130 ,5,'Stars: '.$movie['stars'],0,1);



$pdf->Cell(130 ,5,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,'Booking Details :',0,1);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Booking ID: '.$booking['booking_id'],0,1);

$pdf->Cell(130 ,5,'Show date : '.$booking['show_date'],0,1);

$pdf->Cell(130 ,5,'Show time : '.$booking['show_time'],0,1);

$pdf->Cell(130 ,5,'Number of seats : '.$booking['num_of_seat'],0,1);

$pdf->Cell(130 ,5,'Seat Numbers : '.$booking['seat_no'],0,1);

$pdf->Cell(130 ,5,'Booked on : '.$booking['trn_date'],0,1);




$pdf->Cell(130 ,5,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130 ,5,'Payment Details :',0,1);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Paid by : XXXX XXXX XXXX 5621',0,1);

$pdf->Cell(130 ,5,'Cost : Rs '.$booking['amount']." /-",0,1);

$pdf->Cell(130 ,5,'Tax : Rs 00/-',0,1);

$pdf->Cell(130 ,5,'Total cost: Rs '.$booking['amount']." /-",0,1);

$pdf->Cell(130 ,5,'Paid on : '.$booking['trn_date'],0,1);







//make a dummy empty cell as a vertical spacer

;



// The PDF source is in original.pdf
readfile($pdf->Output());
?>