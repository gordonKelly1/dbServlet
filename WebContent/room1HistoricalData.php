
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="cssIndex3.css">
 <link rel="stylesheet" href="/resources/style.css">
 <link rel="stylesheet" href="/resources/jquery-ui.css">
<title>Home auto</title>
 <script src="//code.jquery.com/jquery-1.9.1.js"></script>
 <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="js/themes/dark-blue.js"></script>
<?PHP
include("phpFiles/historicalData/heating/room1.php");
include("phpFiles/historicalData/humidity/room1.php");
include("js/getHistoricalData.php")
?>
 
   <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
 

<script type="text/javascript">
function onLoadFunctions(){
	heating1();
	humidity1();
	 $("#tableStats").hide();
}
</script>


</head>
<body>
<body onload = "onLoadFunctions();">
	<div class = "banner">
 		<img src="logo.png" width="50%" align="middle">
 </div>
 <div  style = "width:100%;height:40px;color:yellow"  >
	<form action="homePage.php" style="color:yellow;background-color: #24243F">
    <input type="submit" value="Home Page" style="color:yellow;background-color: #24243F">
	</form>
 </div>
 <div class = "mainDisplay">
 	<form action="" method="get">
  	<table style = "width:100%; border-spacing:25px">
  		<tr class="hisRoonTable">
  			<td style="width: 20%" valign="top">
  			 <table>	
				 <tr align="center">
				 	<td colspan ="2" >
				 		<label for="from" style="color:yellow;"><font size="3">Select Data</font></label>
				 	</td>
				 </tr>
				 <tr> 
				 	<td>
						<label for="from" style="color:yellow;"><font size="3">From</font></label>
					</td>
					<td>
						<input type="text" id="from" name="from" >
					</td>
				</tr>
				<tr>
					<td>
						<label for="to" style="color:yellow;" ><font size="3">To</font></label>
					</td>
					<td>
						<input type="text" id="to" name="to">
					</td>
				</tr>
				<tr align="center">
				 	<td colspan ="2" >
						<INPUT TYPE="button" NAME="button" Value="View Data" onClick="getHistoricalData(this.form)" style="color:yellow;background-color: #24243F">
					</td>
				</tr>
				<tr  align="center">
					<td id="error" style="color:red;" colspan = "2" >
					</td>
				</tr>
			</table>
			</form>
  			</td>
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
  		<tr class="hisRoonTable">
  			<td style="width: 20%"></td>
  			<td >
  				<div style = "width: 100%;" id = "tableStats">
  					<fieldset class = "dataField" style="color:yellow; valign:center">
  					<legend style="color:yellow; valign:center"><h2>Room Statistics</h2></legend>
  					<table class="historicalTable">
  						<tr style = "width: 100%;">
  							<td style = "width: 20%; height:10px;"></td>
  							<td ><font size="3">On</font></td>
  							<td ><font size="3">Off</font></td>
  							<td ><font size="3">Total</font></td>
  							<td ><font size="3">Predicted Cost</font></td>
  						</tr>
  						<tr>
  							<td><font size="3">Heating</font></td>
  							<td id="heatingOnPeriod"></td>
  							<td id="heatingOffPeriod"></td>
  							<td id="heatingTotal"></td>
  							<td id="heatingCost"></td>
  						</tr>
  						<tr>
  							<td><font size="3">Lighting</font></td>
  							<td id="lightingOnPeriod"></td>
  							<td id="lightingOffPeriod"></td>
  							<td id="lightingCost"></td>
  						</tr>
  					</table>
  				 </fieldset>
  				</div>
  			</td>
  			<td style="width: 20%">
  			</td>
  		</tr>
  	</table>
  </div>

</body>
