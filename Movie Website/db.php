<?php
// Enter your Host, username, password, database below. m(D|u2>/lUO}r?rE
// I left password empty because i do not set password on localhost.
//$con = mysqli_connect("localhost","id15548733_root","m(D|u2>/lUO}r?rE","id15548733_moviedb");
$con = mysqli_connect("localhost","root","","moviedb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

