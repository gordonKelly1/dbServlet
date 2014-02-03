<?php
class Sensor2Data{
	public $temp1 = 0.00;
	public $als1 = 0;
	public $humidity1 = 0.00;
	public $lighting_on1 = 0;
	public $heating_on1 = 0;
	public $temp2 = 0.00;
	public $als2 = 0;
	public $humidity2 = 0.00;
	public $lighting_on2 = 0;
	public $heating_on2 = 0;
	public $temp3 = 0.00;
	public $als3 = 0;
	public $humidity3 = 0.00;
	public $lighting_on3 = 0;
	public $heating_on3 = 0;
	public $temp4 = 0.00;
	public $als4 = 0;
	public $humidity4 = 0.00;
	public $lighting_on4 = 0;
	public $heating_on4 = 0;
}
$con=mysqli_connect("localhost","root","miltown1","db1");


// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = null;
$result = mysqli_query($con,"select * from sensor1 order by entryID desc limit 1");
$e = new Sensor2Data();
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{
	
	$e->temp1 = $row[temp2];
	$e->als1 = $row[als];
	$e->humidity1 = $row[humidity];
	$e->lighting_on1 = $row[lighting_on];
	$e->heating_on1 = $row[heating_on];
	//echo $row[temp2];
	//echo "<br>";
}
$result = mysqli_query($con,"select * from sensor2 order by entryID desc limit 1");
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{

	$e->temp2 = $row[temp2];
	$e->als2 = $row[als];
	$e->humidity2 = $row[humidity];
	$e->lighting_on2 = $row[lighting_on];
	$e->heating_on2 = $row[heating_on];
	//echo $row[temp2];
	//echo "<br>";
}
$result = mysqli_query($con,"select * from sensor3 order by entryID desc limit 1");
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{

	$e->temp3 = $row[temp2];
	$e->als3 = $row[als];
	$e->humidity3 = $row[humidity];
	$e->lighting_on3 = $row[lighting_on];
	$e->heating_on3 = $row[heating_on];
	//echo $row[temp2];
	//echo "<br>";
}
$result = mysqli_query($con,"select * from sensor4 order by entryID desc limit 1");
//$e = new Sensor2Data();
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{

	$e->temp4 = $row[temp2];
	$e->als4 = $row[als];
	$e->humidity4 = $row[humidity];
	$e->lighting_on4 = $row[lighting_on];
	$e->heating_on4 = $row[heating_on];
	//echo $row[temp2];
	//echo "<br>";
}

mysqli_close($con);
$json_obj = json_encode($e);
header('Content-Type: application/json');
echo $json_obj;
?>