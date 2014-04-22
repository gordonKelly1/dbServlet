<?php
$room_num =-1;
if(isset($_POST['submit_0'])) {$room_num = 0;}
elseif (isset($_POST['submit_1'])) {$room_num = 1;}
elseif (isset($_POST['submit_2'])) {$room_num = 2;}
elseif (isset($_POST['submit_3'])) {$room_num = 3;}
$array = $_POST['room'];

echo "<table>";
echo $room_num;


foreach ($_POST as $key => $value) {
	echo "<tr>";
	echo "<td>";
	echo $key;
	echo "</td>";
	echo "<td>";
	echo $value;
	echo "</td>";
	echo "</tr>";
}

echo "</table>";

foreach ($array[$room_num] as $k => $v)
{
	echo "key ".$k." value ".$v."<br>";
}


if($room_num != -1)
{
	foreach ($array[$room_num] as $k => $v) {
		if(($v != '')&&((strpos($k,'lightingOn') !== false)||(strpos($k,'heatingOn') !== false)))
		{
			$repeat = 0;
			$row_num = substr($k, -1);
			$on_time = strtotime($v);
			

			if(strpos($k,'lightingOn') !== false)
			{
				$repeat_string = "lightingRepeat".$row_num;
				if(isset($array[$room_num][$repeat_string])){$repeat = 1;}
				
				$end_of_input = "lightingOff".$row_num;
				$off_time = strtotime($array[$room_num][$end_of_input]);
		//		echo strtotime($on_time)."<br>";
				$sqlCommands[] = "INSERT INTO events (room_num, eventType, onTime, offTime, repeated)
                 VALUES (".$room_num.", 'lighting', ".$on_time.", ".$off_time.", ".$repeat.")";
			}
			if(strpos($k,'heatingOn') !== false)
			{
				$repeat_string = "heatingRepeat".$row_num;
				if(isset($array[$room_num][$repeat_string])){$repeat = 1;}
				$end_of_input = "heatingOff".$row_num;
				$off_time = strtotime($array[$room_num][$end_of_input]);
				$sqlCommands[] = "INSERT INTO events (room_num, eventType, onTime, offTime, repeated)
                VALUES (".$room_num.", 'heating', ".$on_time.", ".$off_time.", ".$repeat.")";
			}
		}
	}

	$con=mysqli_connect("localhost","root","miltown1","db1");
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$deleteAll = "delete from events where room_num = ".$room_num;
	$result = mysqli_query($con,$deleteAll);
	foreach($sqlCommands as $value) {
		$result = mysqli_query($con,$value );
		
	}
	
	
	
	
}

?>