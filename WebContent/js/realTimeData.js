function getRealTimeData(){
			//realTimeData();
					  	var xmlhttp;
					 
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
					  			//alert("xmlhttpResponse");
						  		var jsonObject = JSON.parse(xmlhttp.responseText);
						  		alert
					  			//var jsonObject = xmlhttp.responseText;
					  			alert(jsonObject.temp);
						  		document.getElementById("temp2").innerHTML=jsonObject.temp;
						    	//document.getElementById("humidity").innerHTML=jsonObject.humidity.toFixed(1);
						    	document.getElementById("als").innerHTML=xmlhttp.responseText;
						    	//document.getElementById("temp2").innerHTML=jsonObject.s3_temp.toFixed(1);
						    	//document.getElementById("humidity3").innerHTML=jsonObject.s3_humidity.toFixed(1);
						    	//document.getElementById("als3").innerHTML=jsonObject.s3_als;
					    	}
					 	 };
						xmlhttp.open("GET","/phpFiles/realTimeData/realTimeData.php",true);
						xmlhttp.send();
						setTimeout(getRealTimeData,5000);
						
}