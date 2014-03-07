<?php
$con=mysqli_connect("localhost","root","miltown1","db1");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$sql="SELECT * FROM info WHERE username='$myusername' and passwor='$mypassword'";
// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);


$result = mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$row = mysqli_fetch_array($result);
$pass = $row[passwor];
$countA=$row[0];
// If result matched $myusername and $mypassword, table row must be 1 row

//if((strcmp($pass,"pass"))==0){
if($countA == 1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword");
header("location:homePage.php");
}
else {
header("location:logIn.php");
}
?>