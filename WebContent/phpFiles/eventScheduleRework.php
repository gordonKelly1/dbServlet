<?php
$room_num =$_GET['room_num'];
$array = $_GET['room'];

/*
foreach ($_GET as $key => $value) {
	echo "<tr>";
	echo "<td>";
	echo $key;
	echo "</td>";
	echo "<td>";
	echo $value;
	echo "</td>";
	echo "</tr>";
}


foreach ($array[$room_num] as $k => $v)
{
	echo "key ".$k." value ".$v."<br>";
}
*/

if($room_num != -1)
{
	foreach ($array[$room_num] as $k => $v) {
		if(($v != '')&&((strpos($k,'lightingOn') !== false)||(strpos($k,'heatingOn') !== false)))
		{
			$repeat = 0;
			$remove =0;
			$row_num = substr($k, -1);
			$row_numPlus1 = $row_num+1;
			$on_time = strtotime($v);
			
			

			if(strpos($k,'lightingOn') !== false)
			{                     
				$remove_string = "lightingRemove".$row_num;
				$repeat_string = "lightingRepeat".$row_num;
				if(isset($array[$room_num][$repeat_string])){$repeat = 1;}
				
				$end_of_input = "lightingOff".$row_num;
				$off_time = strtotime($array[$room_num][$end_of_input]);
		//		echo strtotime($on_time)."<br>";
				if($off_time < $on_time)
				{
					echo "error in Lighting row ".$row_numPlus1." entry not accepted<br>";
				}
				else
				{
					if(isset($array[$room_num][$remove_string]))
					{
						
					}
					else
					{
						echo "Lighting set for entry row ".$row_numPlus1."<br>";
						$sqlCommands[] = "INSERT INTO events (room_num, eventType, onTime, offTime, repeated)
	                	 VALUES (".$room_num.", 'light', ".$on_time.", ".$off_time.", ".$repeat.")";
					}
					
					
					
				}
			}
			if(strpos($k,'heatingOn') !== false)
			{
				$remove_string = "lightingRemove".$row_num;
				$repeat_string = "heatingRepeat".$row_num;
				if(isset($array[$room_num][$repeat_string])){$repeat = 1;}
				$end_of_input = "heatingOff".$row_num;
				$off_time = strtotime($array[$room_num][$end_of_input]);
				
				if($off_time < $on_time)
				{
					echo "error in Heating row ".$row_numPlus1." entry not accepted<br>";
				}
				else
				{
					if(isset($array[$room_num][$remove_string]))
					{
				
						
					}
					else
					{
						echo "Heating set for entry row ".$row_numPlus1."<br>";
						$sqlCommands[] = "INSERT INTO events (room_num, eventType, onTime, offTime, repeated, row_num)
                         VALUES (".$room_num.", 'heat', ".$on_time.", ".$off_time.", ".$repeat." ,".$row_num.")";
					}
				}
			
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