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
<?PHP
	include("phpFiles/heating/heating1.php");
	include("phpFiles/heating/heating2.php");
	include("phpFiles/heating/heating3.php");
	include("phpFiles/heating/heating4.php");
	include("phpFiles/humidity/humidity1.php");
	include("phpFiles/humidity/humidity2.php");
	include("phpFiles/humidity/humidity3.php");
	include("phpFiles/humidity/humidity4.php");
    include("phpFiles/sw_status_dbQuery.php");
?>
<script src="js/realTimeData.js"></script>
<script src="js/lightSwitching.js"></script>
<script type="text/javascript">
function onLoadFunctions(){

	getRealTimeData();
	displayHeating();
	setSwStatus();
};

</script>
<script>

</script>
<script type="text/javascript">
function displayHeating(){
	heating1();
	heating2();
	heating3();
	heating4();
	setTimeout(displayHumidity,15000);
	
};
function displayHumidity(){
	humidity1();
	humidity2();
	humidity3();
	humidity4();
	setTimeout(displayHeating,15000);
	
};

</script>
</head>
<body onload = "onLoadFunctions();">
	<div class = "banner">
 		<img src="logo.png" width="50%" align="middle">
 </div>
 <div  style = "width:100%,height:40px"></div>
 <div class = "mainDisplay">
 	<table width="100%">
 		<tr class = "roomTable">
 			<td>
 				 <table style= width:100% >
 	 				<tr>
 	 					<td class = "tdGui"><div id ="containerSensor1" style="height:100%; width:100%; background-color:#232325"></div></td>
 	 					<td class = "tdData" width = "90%">
 	 						<fieldset class = "dataField">
 	   						    <legend style="color:yellow">Room 1</legend>
 	 							<table width="100%" height="171" border="0" cellpadding="0">
         							 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											temp = 22;
	 											document.write("Temperature     </td><td class = \"td2\" id = \"temp1\">"+ temp+"</td>");
	 										 </script>
        	  						 </tr>
          	    					 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											humidity = 22;
	 											document.write("Humidity    </td><td class = \"td2\" id = \"humidity1\">"+ humidity +"</td>");
	 										 </script>
         							 </tr>
          							 <tr>
            	 						 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											als = 22;
	 											document.write("Lighting Level    </td><td class = \"td2\" id = \"als1\">"+ als +"</td>");
	 										 </script>
          							</tr>
          							<tr>
          								<td colspan = "4">
          								 <div  style = "width:100%;height:2px;background-color:yellow;"></div>
          								 </td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Lighting ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="light1"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
										
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Heating ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="heat1"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
										<td><script type="text/javascript">document.write("Heat");</script></td>
										<td><input type="range" min="10" max="30" value="0" step="1" onchange="rangevalue1.value=value" id="tempTreshold1"/>
											<span class="highlight"></span>
											<output id="rangevalue1">50</output></td>
         							 </tr>
        						</table>
        					 </fieldset>
      					  </td>
 	 				<td class = "tdMenu">tdmenu</td>
 	 			</tr>
 			 </table>
 		   </td>
 		</tr>
 	    <tr class = "roomTable">
 		   <td>
 			 <table style="width:100%">
 	 			<tr>
 	 				<td class = "tdGui"><div id ="containerSensor2" style="height:100%; width:100%; background-color:#232325"></div></td>
 	 				<td class = "tdData" width = "90%">
 	 					<fieldset class = "dataField">
 	   						 <legend style="color:yellow">Room 1</legend>
 	 						 <table width="100%" height="171" border="0" cellpadding="0">
         							 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											temp = 22;
	 											document.write("Temperature</td><td class = \"td2\" id = \"temp2\">"+ temp+"</td>");
	 										 </script>
        	  						 </tr>
          	    					 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											humidity = 22;
	 											document.write("Humidity</td><td class = \"td2\" id = \"humidity2\">"+ humidity +"</td>");
	 										 </script>
         							 </tr>
          							 <tr>
            	 						 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											als = 22;
	 											document.write("Lighting Level</td><td class = \"td2\"id = \"als2\">"+ als +"</td>");
	 										 </script>
          							</tr>
          							<tr>
          								<td colspan = "4">
          								 <div  style = "width:100%;height:2px;background-color:yellow;"></div>
          								 </td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Lighting ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="light2"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Heating ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="heat2"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
										<td><script type="text/javascript">document.write("Heat");</script></td>
										<td><input type="range" min="10" max="30" value="0" step="1" onchange="rangevalue2.value=value" id="tempTreshold2"/>
											<span class="highlight"></span>
											<output id="rangevalue2">50</output></td>
         							 </tr>
        						</table>
				         </fieldset>
				       </td>
 	 				<td class = "tdMenu" id = "tdMenu">tdmenu</td>
 	 			</tr>
 			 </table>
 		  </td>
 		</tr>
 		<tr class = "roomTable">
 		 <td>
 			 <table style="width:100%">
 	 			<tr>
 	 				<td class = "tdGui"><div id ="containerSensor3" style="height:100%; width:100%; background-color:#232325"></div></td>
 	 				<td class = "tdData" width = "90%">
 	 					<fieldset class = "dataField">
 	   						 <legend style="color:yellow">Room 1</legend>
 	 						 <table width="100%" height="171" border="0" cellpadding="0">
         							 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											temp = 22;
	 											document.write("Temperature</td><td class = \"td2\"id = \"temp3\">"+ temp+"</td>");
	 										 </script>
        	  						 </tr>
          	    					 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											humidity = 22;
	 											document.write("Humidity</td><td class = \"td2\" id = \"humidity3\">"+ humidity +"</td>");
	 										 </script>
         							 </tr>
          							 <tr>
            	 						 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											als = 22;
	 											document.write("Lighting Level</td><td class = \"td2\"id = \"als3\">"+ als +"</td>");
	 										 </script>
          							</tr>
          							<tr>
          								<td colspan = "4">
          								 <div  style = "width:100%;height:2px;background-color:yellow;"></div>
          								 </td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Lighting ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="light3"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Heating ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="heat3"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
										<td><script type="text/javascript">document.write("Heat");</script></td>
										<td><input type="range" min="10" max="30" value="0" step="1" onchange="rangevalue3.value=value" id="tempTreshold3"/>
											<span class="highlight"></span>
											<output id="rangevalue3">50</output></td>
         							 </tr>
        						</table>
				         </fieldset>
				       </td>
 	 				<td class = "tdMenu">tdmenu</td>
 	 			</tr>
 			 </table>
 		  </td>
 		</tr>
 		<tr class = "roomTable">
 		  <td>
 			 <table style="width:100%">
 	 			<tr>
 	   				
 	 				<td class = "tdGui"><div id ="containerSensor4" style="height:100%; width:100%; background-color:#232325"></div></td>
 	 				<td class = "tdData" width = "90%">
 	 					<fieldset class = "dataField">
 	   						 <legend style="color:yellow">Room 1</legend>
 	 						 <table width="100%" height="171" border="0" cellpadding="0">
         							 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											temp = 22;
	 											document.write("Temperature</td><td class = \"td2\" id = \"temp4\">"+ temp+"</td>");
	 										 </script>
        	  						 </tr>
          	    					 <tr>
           								 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											humidity = 22;
	 											document.write("Humidity</td><td class = \"td2\" id = \"humidity4\">"+ humidity +"</td>");
	 										 </script>
         							 </tr>
          							 <tr>
            	 						 <td width="60%" colspan="3">
           									 <script type="text/javascript">
	 											als = 22;
	 											document.write("Lighting Level</td><td class = \"td2\" id = \"als4\">"+ als +"</td>");
	 										 </script>
          							</tr>
          							<tr>
          								<td colspan = "4">
          								 <div  style = "width:100%;height:2px;background-color:yellow;"></div>
          								 </td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Lighting ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="light4"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
          							</tr>
          							<tr>
           								 <td> <script type="text/javascript">document.write("\t  Heating ");</script></td>
           								 <td><label id="sliderLabel">
										    <input type="checkbox" id="heat4"/>
										    <span id="slider"></span>
										    <span id="sliderOn">On</span>
										    <span id="sliderOff">Off</span>
										</label></td>
										<td><script type="text/javascript">document.write("Heat");</script></td>
										<td><input type="range" min="10" max="30" value="0" step="1" onchange="rangevalue4.value=value" id="tempTreshold4"/>
											<span class="highlight"></span>
											<output id="rangevalue4">50</output></td>
         							 </tr>
        						</table>
				         </fieldset>
				       </td>
 	 				<td class = "tdMenu">tdmenu</td>
 	 			</tr>
 			 </table>
 		  </td>
 		</tr>
 	</table>
 </div>
</body>
</html>
