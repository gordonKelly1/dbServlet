function realTimedata()
			{
					  	var xmlhttp;
					 
					 // document.getElementById("myDiv").innerHTML=hello;
						if (window.XMLHttpRequest)
					  	{// code for IE7+, Firefox, Chrome, Opera, Safari
					  		xmlhttp=new XMLHttpRequest();
					  		// alert("xmlhttpRequest");
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
						    	document.getElementById("temp2").innerHTML=jsonObject.s2_temp.toFixed(1);
						    	document.getElementById("humidity2").innerHTML=jsonObject.s2_humidity.toFixed(1);
						    	document.getElementById("als2").innerHTML=jsonObject.s2_als;
						    	document.getElementById("temp3").innerHTML=jsonObject.s3_temp.toFixed(1);
						    	document.getElementById("humidity3").innerHTML=jsonObject.s3_humidity.toFixed(1);
						    	document.getElementById("als3").innerHTML=jsonObject.s3_als;
					    	}
					 	 }
						xmlhttp.open("GET","sensorData?operation=getData",true);
						xmlhttp.send();
			};