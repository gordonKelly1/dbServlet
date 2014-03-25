<script type="text/javascript">


function requestData() {
	
	var xmlhttp;
	
	  
	 
	 // document.getElementById("myDiv").innerHTML=hello;
		if (window.XMLHttpRequest)
	  	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  		xmlhttp=new XMLHttpRequest();
	  	}
		else
	  	{// code for IE6, IE5
	  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  	}
		
		xmlhttp.onreadystatechange=function()
	  	{
		
			
			
	  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	   		 {
	  			//alert("xmlhttpResponse");
	  			//alert(xmlhttp.responseText);
	  			
		  		var jsonObject = JSON.parse(xmlhttp.responseText);
		  		var jsonArrays = new Array();
		  		var tempDataArray = new Array();
		  		var tempLevelArray = new Array();
		  		var onOffArray = new Array();
		  		var humidityArray = new Array();
		  		var alsArray = new Array();
		  		
		  		
		  		for(var i =0; i <4;i++)
		  		{
		  			jsonArrays[i] = JSON.parse(jsonObject[i]);
		  		}
		  		
		  		
		  		//alert(jsonArrays[0].length);
		  		
		  		tstamp = jsonArrays[0].tstamp*1000;
		  		var dataPointArray = new Array();
		  		
		  		dataPointArray[0] = jsonArrays[0].tstamp*1000;
		  		
		  		//alert(dataPointArray.toString());
		  		var series = chart1A.series[0];
		  		console.log(chart1A.series[0]);
		  		shift = series.data.length > 20000; // shift if the series is 
	                                                 // longer than 20
		  		<?php 
		  		
		  		for($i = 1; $i <5;$i++)
		  		{ 
			  	    echo "dataPointArray[1] = parseFloat(jsonArrays[".($i-1)."].heating_currently_on);
			  		chart".$i."A.series[0].addPoint(dataPointArray, true, true);";
			  	    echo "dataPointArray[1] = parseFloat(jsonArrays[".($i-1)."].temp);
			  		chart".$i."A.series[1].addPoint(dataPointArray, true, true);";
			  		echo "dataPointArray[1] = parseFloat(jsonArrays[".($i-1)."].tempLevel);
			  		chart".$i."A.series[2].addPoint(dataPointArray, true, true);";
			  		echo "dataPointArray[1] =	parseFloat(jsonArrays[".($i-1)."].humidity);
			  		chart".$i."B.series[0].addPoint(dataPointArray, true, true);";
			  	    //echo " ";
		  		}
		  		?>

	            setTimeout(requestData, 60000);    
	    	}
	    	
	 	 };
		xmlhttp.open("GET","/phpFiles/updateChartData.php",true);
		xmlhttp.send();
		setTimeout(getRealTimeData,5000);
}
function changeDiv() {
	if(divDisplayVari == 0){
		
	document.getElementById("containerSensor1A").style.zIndex = 0;
	document.getElementById("containerSensor1B").style.zIndex = 1;
	document.getElementById("containerSensor2A").style.zIndex = 0;
	document.getElementById("containerSensor2B").style.zIndex = 1;
	document.getElementById("containerSensor3A").style.zIndex = 0;
	document.getElementById("containerSensor3B").style.zIndex = 1;
	document.getElementById("containerSensor4A").style.zIndex = 0;
	document.getElementById("containerSensor4B").style.zIndex = 1;
	divDisplayVari++;
	}
	else{
		document.getElementById("containerSensor1A").style.zIndex = 1;
		document.getElementById("containerSensor1B").style.zIndex = 0;
		document.getElementById("containerSensor2A").style.zIndex = 1;
		document.getElementById("containerSensor2B").style.zIndex = 0;
		document.getElementById("containerSensor3A").style.zIndex = 1;
		document.getElementById("containerSensor3B").style.zIndex = 0;
		document.getElementById("containerSensor4A").style.zIndex = 1;
		document.getElementById("containerSensor4B").style.zIndex = 0;
		divDisplayVari=0;
	}
	
	setTimeout(changeDiv, 15000);  
}

</script>
