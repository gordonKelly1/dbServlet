
function getUsageData()
{
  	var xmlhttp;
 
			 document.getElementById("error").innerHTML= ""; 
			 
		 // document.getElementById("myDiv").innerHTML=hello;
			if (window.XMLHttpRequest)
		  	{// code for IE7+, Firefox, Chrome, Opera, Safari
		  		xmlhttp=new XMLHttpRequest();
		  	 //   alert("xmlhttpRequest");
		  	}
			else
		  	{// code for IE6, IE5
		  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  	}
			
			xmlhttp.onreadystatechange=function()
		  	{
			
				
				
			  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			   		 {
			  				var jsonObject = JSON.parse(xmlhttp.responseText);
			  				
					  			jsonObject = JSON.parse(jsonObject);
					  		  var electricityPrice = parseFloat(jsonObject.electricity_price);
						      var oilPrice = parseFloat(jsonObject.oil_price);
						     
						      //alert("oil price "+oilPrice+"\ elec "+electricityPrice);
		                      var lightingCost = (lightingOn/60*(electricityPrice/1000))*10;//lighting on time in hours*price/toCents/10 for 100W*10 and an extra 0 for 100w is for the fact data is only read every 10 mins
						      var heatingOnPercent = (100/chart1A.series[0].data.length)*heatingOn;
						      var lightingOnPercent = (100/chart1A.series[0].data.length)*lightingOn;
						      var heatingCost = (heatingOn/60)*2.27*oilPrice*10;  //*mins/hours*litersPerHour*price*10 is for the fact data is only read every 10 mins
							        
						        document.getElementById("heatingOnPeriod").innerHTML= "<h2><i>"+heatingOnPercent.toFixed(1)+"%</i></h2>";
						        document.getElementById("heatingOffPeriod").innerHTML= "<h2><i>"+(100-heatingOnPercent).toFixed(1)+"%</i></h2>";
						        document.getElementById("heatingTotal").innerHTML= "<h2><i>"+heatingOn*10+" mins</i></h2>";
						        document.getElementById("heatingCost").innerHTML= "<h2><i>"+heatingCost.toFixed(2)+" eur</i></h2>";
						        document.getElementById("lightingOnPeriod").innerHTML= "<h2><i>"+lightingOnPercent.toFixed(1)+"%</i></h2>";
						        document.getElementById("lightingOffPeriod").innerHTML= "<h2><i>"+(100-lightingOnPercent).toFixed(1)+"%</i></h2>";
						        document.getElementById("lightingTotal").innerHTML= "<h2><i>"+lightingOn*10+" mins</i></h2>";
						        document.getElementById("lightingCost").innerHTML= "<h2><i>"+lightingCost.toFixed(2)+" eur</i></h2>";
						        $("#tableStats").show();
					   		 
			   		 }
		    	
			 };
			var data = "&room_num="+room_num;
			var url = "/phpFiles/historicalData/get1weekUsageData.php?";
			url = url+data;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
		
	
}
