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
		  		
		  		
		  		/*
		  		for(var i =0; i <4;i++)
		  		{
		  			tempDataArray[i] = parseFloat(jsonArrays[0].temp);
		  			tempLevelArray = parseInt(jsonArrays[0].tempLevel);
			  		heatOnOffArray = parseInt(jsonArrays[0].heating_currently_on);
			  		humidityArray = parseInt(jsonArrays[0].humidity);
			  		alsArray = parseInt(jsonArrays[0].als);
			  		
		  		}
		  		*/
		  		
		  		tstamp = jsonArrays[0].tstamp*1000;
		  		var dataPointArray = new Array();
		  		
		  		dataPointArray[0] = jsonArrays[0].tstamp*1000;
		  		
		  		//alert(dataPointArray.toString());
		  		var series = chart1A.series[0];
		  		shift = series.data.length > 20000; // shift if the series is 
	                                                 // longer than 20
		  		
		  		dataPointArray[1] =	parseFloat(jsonArrays[0].heating_currently_on);
		  		chart1A.series[0].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[0].temp);
		  		chart1A.series[1].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[0].tempLevel);
		  		chart1A.series[2].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[0].humidity);
		  		chart1B.series[0].addPoint(dataPointArray, true, true);
		  		
		  		dataPointArray[1] =	parseFloat(jsonArrays[1].temp);
		  		chart2A.series[0].addPoint(dataPointArray, true, true);		  		
		  		dataPointArray[1] =	parseFloat(jsonArrays[1].tempLevel);
		  		chart2A.series[1].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =parseFloat(jsonArrays[1].heating_currently_on);
		  		chart2A.series[2].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[1].humidity);
		  		chart2B.series[0].addPoint(dataPointArray, true, true);
		  		
		  		
	            // call it again after one second
		  		dataPointArray[1] =	parseFloat(jsonArrays[2].temp);
		  		chart3A.series[0].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[2].tempLevel);
		  		chart3A.series[1].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[2].heating_currently_on);
		  		chart3A.series[2].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[2].humidity);
		  		chart3B.series[0].addPoint(dataPointArray, true, true);
		  		
		  		dataPointArray[1] =	parseFloat(jsonArrays[3].temp);
		  		chart4A.series[0].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[3].tempLevel);
		  		chart4A.series[1].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[3].heating_currently_on);
		  		chart4A.series[2].addPoint(dataPointArray, true, true);
		  		dataPointArray[1] =	parseFloat(jsonArrays[3].humidity);
		  		chart4B.series[0].addPoint(dataPointArray, true, true);
		  		
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


