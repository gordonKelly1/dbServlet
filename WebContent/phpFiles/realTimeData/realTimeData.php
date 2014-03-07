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
$result = mysqli_query($con,"select * from current_data");
$e = new Sensor2Data();
// echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
while($row = mysqli_fetch_array($result))
{
	
	$e->temp1 = $row[room1_temp];
	$e->als1 = $row[room1_als];
	$e->humidity1 = $row[room1_humidity];
	$e->temp2 = $row[room2_temp];
	$e->als2 = $row[room2_als];
	$e->humidity2 = $row[room2_humidity];
	$e->temp3 = $row[room3_temp];
	$e->als3 = $row[room3_als];
	$e->humidity3 = $row[room3_humidity];
	$e->temp4 = $row[room4_temp];
	$e->als4 = $row[room4_als];
	$e->humidity4 = $row[room4_humidity];
	
}
mysqli_close($con);
$json_obj = json_encode($e);
header('Content-Type: application/json');
echo $json_obj;
?>