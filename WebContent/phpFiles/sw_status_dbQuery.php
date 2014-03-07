<?php
 
 $con=mysqli_connect("localhost","root","miltown1","db1");

// Check connection
 if (mysqli_connect_errno())
 {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT room1_lightSw_on, room1_heatSw_on, room2_lightSw_on, room2_heatSw_on, room3_lightSw_on, room3_heatSw_on, room4_lightSw_on, room4_heatSw_on, masterHeatSwOn, masterLightSwOn FROM current_data" );
  $row = mysqli_fetch_array($result);
  $room1_lightSw_on = $row[room1_lightSw_on];
  $room1_heatSw_on = $row[room1_heatSw_on];
  $room2_lightSw_on = $row[room2_lightSw_on];
  $room2_heatSw_on = $row[room2_heatSw_on];
  $room3_lightSw_on = $row[room3_lightSw_on];
  $room3_heatSw_on = $row[room3_heatSw_on];
  $room4_lightSw_on = $row[room4_lightSw_on];
  $room4_heatSw_on = $row[room4_heatSw_on];
  $masterLightSw = $row[masterLightSwOn];
  $masterHeatSw = $row[masterHeatSwOn];
  
  $result = mysqli_query($con,"SELECT heating_limit FROM sensor1 order by entryID desc limit 1" );
  $row = mysqli_fetch_array($result);
  $room1_heating_limit = $row[heating_limit];
  
  $result = mysqli_query($con,"SELECT heating_limit FROM sensor2 order by entryID desc limit 1" );
  $row = mysqli_fetch_array($result);
  $room2_heating_limit = $row[heating_limit];
  
  $result = mysqli_query($con,"SELECT heating_limit FROM sensor3 order by entryID desc limit 1" );
  $row = mysqli_fetch_array($result);
  $room3_heating_limit = $row[heating_limit];
  
  $result = mysqli_query($con,"SELECT heating_limit FROM sensor4 order by entryID desc limit 1" );
  $row = mysqli_fetch_array($result);
  $room4_heating_limit = $row[heating_limit];
  
  
  mysqli_close($con);
?>
<script type="text/javascript">

function setSwStatus(){

	document.getElementById("light1").checked = <?php echo $room1_lightSw_on ?> ;
	document.getElementById("heat1").checked = <?php echo $room1_heatSw_on?>;
	document.getElementById("light2").checked = <?php echo $room2_lightSw_on ?> ;
	document.getElementById("heat2").checked = <?php echo $room2_heatSw_on?>;
	document.getElementById("light3").checked = <?php echo $room3_lightSw_on ?> ;
	document.getElementById("heat3").checked = <?php echo $room3_heatSw_on?>;
	document.getElementById("light4").checked = <?php echo $room4_lightSw_on ?> ;
	document.getElementById("heat4").checked = <?php echo $room4_heatSw_on?>;
	document.getElementById("masterHeat").checked = <?php echo $masterHeatSw?>;
	document.getElementById("masterLight").checked = <?php echo $masterLightSw?>;
	document.getElementById("rangevalue1").value = <?php echo $room1_heating_limit?>;
	document.getElementById("rangevalue2").value = <?php echo $room2_heating_limit?>;
	document.getElementById("rangevalue3").value = <?php echo $room3_heating_limit?>;
	document.getElementById("rangevalue4").value = <?php echo $room4_heating_limit?>;
	document.getElementById("tempTreshold1").value = <?php echo $room1_heating_limit?>;
	document.getElementById("tempTreshold2").value = <?php echo $room2_heating_limit?>;
	document.getElementById("tempTreshold3").value = <?php echo $room3_heating_limit?>;
	document.getElementById("tempTreshold4").value = <?php echo $room4_heating_limit?>;
	
}
</script>