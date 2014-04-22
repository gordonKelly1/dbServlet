<?php
class Prices{
	public $electricity_price = 0;
	public $oil_price = 0.00;
}
$con=mysqli_connect("localhost","root","miltown1","db1");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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

