<?php

$con=mysqli_connect("localhost","root","miltown1","db1");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$selectAll = "select * from events ";
$results = mysqli_query($con,$selectAll);
$date = new DateTime();

$host = "127.0.0.1";
$port = "1888";
set_time_limit(0);


$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

while($row = mysqli_fetch_array($results))
{
	$epoch = $date->getTimestamp();
	echo "on ".$row[onTime]."offtime ".$row[offTime]." <br>";
	 if(($row[onTime] < $epoch))
	 {
	 	echo "in switch on";
	 	$on_length = $row[offTime]-$epoch;
	 	$room_num = $row[$room_num];
	 	$application = $row[$eventType];
	 	
	 	if(!($row[offTime] < $epoch))
	 	{
	 		//echo $on_lenght;
			$message =$row[eventType].$row[room_num]."true//".$on_length;
			echo $message;
	 	 	socket_write($socket,$message, strlen($message))or die("Could not send data to server");
	 		
	 	}
	 	if($row[repeated] != 1)
	 	{
	 		$results = mysqli_query($con,"delete from events where entryId =".$row[entryId]);
	 	}
	 	else
	 	{
	 		
	 		$row[onTime]+=86400;
	 		$row[offTime]+=86400;
	 		$results = mysqli_query($con,"update events set onTime = ".$row[onTime].", offTime = ".$row[offTime]." where entryId =".$row[entryId]);
	 		
	 	}
	 	
	 }
	 
	 
	
}
socket_close($socket);