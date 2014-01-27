<?php
class Sensor2Data{
	public $temp = 0.00;
	public $als = 0;
	public $humidity = 0.00;
	public $lighting_on = 0;
	public $heating_on = 0;
}
$con=mysqli_connect("localhost","root","miltown1","db1");


// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = null;
$result = mysqli_query($con,"select * from sensor2 order by entryID desc limit 1");
$e = new Sensor2Data();
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{
	
	$e->temp = $row[temp2];
	$e->als = $row[als];
	$e->humidity = $row[humidity];
	$e->lighting_on = $row[lighting_on];
	$e->heating_on = $row[heating_on];
	//echo $row[temp2];
	//echo "<br>";
}

mysqli_close($con);
$json_obj = json_encode($e);
header('Content-Type: application/json');
echo $json_obj;
?>