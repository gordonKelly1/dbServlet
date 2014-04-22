<?php
 class swStatus{
 	
 public 	$room1_lightSw_on = 0;
 public   	$room1_heatSw_on = 0;
 public 	$room2_lightSw_on = 0;
 public 	$room2_heatSw_on = 0;
 public 	$room3_lightSw_on = 0;
 public 	$room3_heatSw_on = 0;
 public 	$room4_lightSw_on = 0;
 public 	$room4_heatSw_on = 0;
 public 	$masterLightSw = 0;
 public 	$masterHeatSw = 0;
 	
 }
 $con=mysqli_connect("localhost","root","miltown1","db1");
 $e = new swStatus();
// Check connection
 if (mysqli_connect_errno())
 {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT room1_lightSw_on, room1_heatSw_on, room2_lightSw_on, room2_heatSw_on, room3_lightSw_on, room3_heatSw_on, room4_lightSw_on, room4_heatSw_on, masterHeatSwOn, masterLightSwOn FROM current_data" );
  $row = mysqli_fetch_array($result);
  
  $e->room1_lightSw_on = $row[room1_lightSw_on];
  $e->room1_heatSw_on = $row[room1_heatSw_on];
  $e->room2_lightSw_on = $row[room2_lightSw_on];
  $e->room2_heatSw_on = $row[room2_heatSw_on];
  $e->room3_lightSw_on = $row[room3_lightSw_on];
  $e->room3_heatSw_on = $row[room3_heatSw_on];
  $e->room4_lightSw_on = $row[room4_lightSw_on];
  $e->room4_heatSw_on = $row[room4_heatSw_on];
  $e->masterLightSw = $row[masterLightSwOn];
  $e->masterHeatSw = $row[masterHeatSwOn];
  
  
  mysqli_close($con);
  
  $json_obj = json_encode($e);
  header('Content-Type: application/json');
  echo $json_obj;

 
	