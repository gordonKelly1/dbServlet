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
<script type="text/javascript">var chartA;var divDisplayVari = 0; </script>
<?PHP
	include("js/updateData.php");
	for($var = 1;$var <5; $var++)
	{ 
		$room_num = $var;
		include("phpFiles/heating/heating1.php");
	}
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
	setTimeout(requestData,1000);
	
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
	humidity1();
	heating2();
	humidity2();
	heating3();
	heating4();
	humidity3();
	humidity4();
	changeDiv();
	
};
function displayHumidity(){
	//humidity1();
	//humidity2();
	//humidity3();
	//humidity4();
	//setTimeout(displayHeating,15000);
	
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
 	 					<td class = "tdGui">
 	 						<div style="height:100%; width:100%; position: relative;">
 	 						<div id ="containerSensor1A" style="height:100%; width:100%; background-color:#232325; position: absolute; z-index: 2; left: 0; top: 0;"></div>
 	 						<div id ="containerSensor1B" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 1;"></div>
 	 						<div id ="containerSensor1C" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 0;"></div>
 	 						</div>				
 	 					</td>
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
											<span class="highlight"></span></td>
										<td><output id="rangevalue1">50</output></td>
         							 </tr>
        						</table>
        					 </fieldset>
      					  </td>
 	 				<td class = "tdMenu">
 	 					<fieldset class = "menuField">
 	   						    <legend style="color:yellow; width:100%; text-align:center;"><pre>Historical Data</pre></legend>
 	 							<table style = "border-spacing:10px; width:100%">
 	 								<tr>
 	 									<td width = "40%"></td>
 	 									<td class = "button" >
 	 										<form action="./room1HistoricalData.php" >
                                               <input type="submit" value="    Room 1     " >
                                            </form>
                                         </td>
                                         <td width = "100%"></td>
 	 								</tr>
 	 								<tr>
 	 									<td width = "10%"></td>
 	 									<td class = "button" >
 	 										<form action="./room2HistoricalData.php" >
                                               <input type="submit" value="    Room 2     ">
                                            </form>
                                         </td>
 	 								</tr>
 	 								<tr>
 	 									<td width = "10%"></td>
 	 									<td class = "button" >
 	 										<form action="./room3HistoricalData.php">
                                               <input type="submit" value="    Room 3     " >
                                            </form>
                                         </td>
 	 								</tr>
 	 								<tr>
 	 									<td width = "10%"></td>
 	 									<td class = "button" width="50px">
 	 										<form action="./room4HistoricalData.php" >
                                               <input type="submit" value="    Room 4     " >
                                            </form>
                                         </td>
 	 								</tr>
 	 								
 	 								
 	 							</table>
 	 					</fieldset>
 	 					
 	 				</td>
 	 			</tr>
 			 </table>
 		   </td>
 		</tr>
 	    <tr class = "roomTable">
 		   <td>
 			 <table style="width:100%">
 	 			<tr>
 	 				<td class = "tdGui">
 	 						<div style="height:100%; width:100%; position: relative;">
 	 						<div id ="containerSensor2A" style="height:100%; width:100%; background-color:#232325; position: absolute; z-index: 2; left: 0; top: 0;"></div>
 	 						<div id ="containerSensor2B" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 1;"></div>
 	 						<div id ="containerSensor2C" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 0;"></div>
 	 						</div>	
 	 				</td>
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
											<span class="highlight"></span></td>
										<td><output id="rangevalue2">50</output></td>
         							 </tr>
        						</table>
				         </fieldset>
				       </td>
 	 				<td class = "tdMenu" id = "tdMenu">
 	 				<fieldset class = "menuField">
 	   						    <legend style="color:yellow; width:100%; text-align:center;"><pre>  Master Switches</pre></legend>
 	 							<table style = "border-spacing:10px;width:100%;">
 	 								<tr >
 	 									
 	 									<td class = "masterButton" align="center" >
 	 									<fieldset class = "menuField" >
 	   										 <legend style="color:yellow; text-align:center;"><pre>Heating</pre></legend>
 	   										 	<label id="sliderLabel">
										  			  <input type="checkbox" id="masterHeat" style = "float: center;"/>
										  				  <span id="slider"></span>
										  				  <span id="sliderOn">On</span>
										   					 <span id="sliderOff">Off</span>
													</label>
 	   										 
 	   									</fieldset>
 	 									</td>
 	 									
 	 								</tr>
 	 								<tr>
 	 									
 	 									<td class = "masterButton" align="center">
 	 									<fieldset class = "menuField">
 	   										 <legend style="color:yellow; text-align:center;"><pre>Lighting</pre></legend>
 	   										 	<label id="sliderLabel">
										  			  <input type="checkbox" id="masterLight"/>
										  				  <span id="slider"></span>
										  				  <span id="sliderOn">On</span>
										   					 <span id="sliderOff">Off</span>
													</label>
 	   										 
 	   									</fieldset>
 	 									</td>
 	 								
 	 									
 	 								</tr>
 	 								<tr>
 	 									
 	 									
 	 								</tr>
 	 								
 	 								
 	 							</table>
 	 					</fieldset>
 	 					
 	 				</td>
 	 			</tr>
 			 </table>
 		  </td>
 		</tr>
 		<tr class = "roomTable">
 		 <td>
 			 <table style="width:100%">
 	 			<tr>
 	 				<td class = "tdGui">
 	 				<div style="height:100%; width:100%; position: relative;">
 	 						<div id ="containerSensor3A" style="height:100%; width:100%; background-color:#232325; position: absolute; z-index: 2; left: 0; top: 0;"></div>
 	 						<div id ="containerSensor3B" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 1;"></div>
 	 						<div id ="containerSensor3C" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 0;"></div>
 	 						</div>	</td>
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
											<span class="highlight"></span></td>
										<td>	<output id="rangevalue3">50</output></td>
         							 </tr>
        						</table>
				         </fieldset>
				       </td>
 	 				<td class = "tdMenu" id = "div1">
 	 				</td>
 	 			</tr>
 			 </table>
 		  </td>
 		</tr>
 		<tr class = "roomTable">
 		  <td>
 			 <table style="width:100%">
 	 			<tr>
 	   				
 	 				<td class = "tdGui">
 	 				<div style="height:100%; width:100%; position: relative;">
 	 						<div id ="containerSensor4A" style="height:100%; width:100%; background-color:#232325; position: absolute; z-index: 2; left: 0; top: 0;"></div>
 	 						<div id ="containerSensor4B" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 1;"></div>
 	 						<div id ="containerSensor4C" style="height:100%; width:100%; background-color:#232325;position: absolute; z-index: 0;"></div>
 	 						</div></td>
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
											<span class="highlight"></span></td>
										<td>	<output id="rangevalue4">50</output></td>
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
