<?php
class Prices{
	public $electricity_price = 0;
	public $oil_price = 0.00;
}

$e = new Prices();
$from = $_GET['from'];
$to = $_GET['to'];
$room_num = $_GET['room_num'];
$fromTstamp = strtotime($from);
$toTstamp = strtotime($to);

//$temp_Json = array();
$humidity_Json = array();
$tempLimit_Json = array();
$onOff_Json = array();
$lighting_on_Json = array();
$als_json = array();

$con=mysqli_connect("localhost","root","miltown1","db1");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT temp2, heating_on, tstamp, heating_limit, humidity, light_on, als FROM sensor".$room_num." where tstamp >".$fromTstamp." and tstamp < ".$toTstamp);

while($row = mysqli_fetch_array($result))
{
	$temp_Json[$row[tstamp]]=$row[temp2];
	$humidity_Json[$row[tstamp]]=$row[humidity];
	$onOff_Json[$row[tstamp]]=$row[heating_on];
	$tempLimit_Json[$row[tstamp]]=$row[heating_limit];
	$lighting_on_Json[$row[tstamp]]=$row[light_on];
	$als_Json[$row[tstamp]]=$row[als];
	
}

$array[] = json_encode($temp_Json);
$array[] = json_encode($tempLimit_Json);
$array[] = json_encode($onOff_Json);
$array[] = json_encode($humidity_Json);
$array[] = json_encode($lighting_on_Json);
$array[] = json_encode($als_Json);

$result = mysqli_query($con,"SELECT electricityPrice, oilPrice FROM info");
while($row = mysqli_fetch_array($result))
{
		
	$e->oil_price = $row[oilPrice];
	$e->electricity_price = $row[electricityPrice];
	
}

$array[] = json_encode($e);
mysqli_close($con);
$json_obj = json_encode($array);
header('Content-Type: application/json');
echo $json_obj;

