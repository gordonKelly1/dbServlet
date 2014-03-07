<?php
session_start();
if(!session_is_registered(myusername)){
header("location:logIn.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="cssIndex3.css">
<title>Home auto</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="js/themes/dark-blue.js"></script>
<script type="text/javascript">
function onLoadFunctions(){
	heating1();
	humidity1();
}
</script>
<?PHP
include("phpFiles/historicalData/heating/room4.php");
include("phpFiles/historicalData/humidity/room4.php");
?>
</head>
<body>
<body onload = "onLoadFunctions();">
	<div class = "banner">
 		<img src="logo.png" width="50%" align="middle">
 </div>
 <div  style = "width:100%,height:40px"></div>
 <div class = "mainDisplay">
  	<table style = "width:100%; border-spacing:25px";>
  		<tr class="hisRoonTable">
  			<td style="width: 20%"></td>
  			<td class = "hisTdGui"><div id ="roomHeating" style="height:100%; width:100%; background-color:#232325"></div></td>
  			<td style="width: 20%">
  			</td>
  		</tr>
  		<tr class="hisRoonTable">
  			<td style="width: 20%"></td>
  			<td class = "hisTdGui"><div id ="roomHumidity" style="height:100%; width:100%; background-color:#232325"></div></td>
  			<td style="width: 20%">
  			</td>
  		</tr>
  	</table>
  </div>
















</body>
