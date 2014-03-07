<?php
// Set the JSON header
class SensorData{
	public $room_num = 0;
	public $temp = 0.00;
	public $tempLevel = 0;
	public $heating_currently_on = 0;
	public $humidity = 0.00;
	public $lighting_on = 0;
	public $heating_sw_on = 0;
	public $als = 0;
	public $tstamp;
	
	
}
$con=mysqli_connect("localhost","root","miltown1","db1");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	
	for ($i = 1;$i <= 4; $i++)
	{
		$result = mysqli_query($con,"select * from sensor".$i." order by entryID desc limit 1");
		$e = new SensorData();
		while($row = mysqli_fetch_array($result))
		{
			
			$e->room_num = $i;
			$e->temp = $row[temp1];
			$e->tempLevel = $row[heating_limit];
			$e->heating_currently_on = $row[heating_on];
			$e->humidity = $row[humidity];
			$e->lighting_on = $row[light_on];
			$e->als = $row[als];
			$e->tstamp = $row[tstamp];
		}
		$array[] = json_encode($e);
	}
	mysqli_close($con);
	$json_obj = json_encode($array);
	header('Content-Type: application/json');
	echo $json_obj;

?>
