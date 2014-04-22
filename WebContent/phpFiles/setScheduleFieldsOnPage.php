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
	
	echo "<script type=\"text/javascript\"> function setScheduleFields(){";
	//echo "<aler"
	while($row = mysqli_fetch_array($results))
	{
	$id = $row[room_num];
	$row_num = $row[row_num];
	$on_time = date('d-m-y H:i:s ',$row[onTime]);
	$off_time = date('d-m-y H:i:s ',$row[offTime]);
	
	if(strpos($row[eventType],'light') !== false)
	{
		$nameL = "room[".$id."][lightingOn".$row_num."]";
		$nameLoff = "room[".$id."][lightingOff".$row_num."]";
		$nameLRepeat = "room[".$id."][lightingRepeat".$row_num."]";
		$nameH = "room[".$id."][heatingON".$row_num."]";
		
		echo "document.getElementsByName(\"".$nameL."\")[0].value = '".$on_time."';";
		echo "document.getElementsByName(\"".$nameLoff."\")[0].value = '".$off_time."';";
		echo "document.getElementsByName(\"".$nameLRepeat."\")[0].checked = ". $row[repeated].";";
	}
	else
	{
		$nameL = "room[".$id."][heatingOn".$row_num."]";
		$nameLoff = "room[".$id."][heatingOff".$row_num."]";
		$nameLRepeat = "room[".$id."][heatingRepeat".$row_num."]";
		
		
		echo "document.getElementsByName(\"".$nameL."\")[0].value = '".$on_time."';";
		echo "document.getElementsByName(\"".$nameLoff."\")[0].value = '".$off_time."';";
		echo "document.getElementsByName(\"".$nameLRepeat."\")[0].checked = ". $row[repeated].";";
	}	
	
}
echo "};</script>";