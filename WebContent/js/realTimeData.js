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
						  		//alert(xmlhttp.responseText);
					  			//var jsonObject = xmlhttp.responseText;
					  			//alert(jsonObject.temp);
						  		document.getElementById("temp1").innerHTML=parseFloat(jsonObject.temp1).toFixed(2);
						    	document.getElementById("humidity1").innerHTML=parseFloat(jsonObject.humidity1).toFixed(2);
						    	document.getElementById("als1").innerHTML=jsonObject.als1;
						    	document.getElementById("temp2").innerHTML= parseFloat(jsonObject.temp2).toFixed(2);
						    	document.getElementById("humidity2").innerHTML=parseFloat(jsonObject.humidity2).toFixed(2);
						    	document.getElementById("als2").innerHTML=jsonObject.als2;
						    	document.getElementById("temp3").innerHTML=parseFloat(jsonObject.temp3).toFixed(2);
						    	document.getElementById("humidity3").innerHTML= parseFloat(jsonObject.humidity3).toFixed(2);
						    	document.getElementById("als3").innerHTML= jsonObject.als3;
						    	document.getElementById("temp4").innerHTML=parseFloat(jsonObject.temp4).toFixed(2);
						    	document.getElementById("humidity4").innerHTML=parseFloat(jsonObject.humidity4).toFixed(2);
						    	document.getElementById("als4").innerHTML=jsonObject.als4;
						    	
					    	}
					 	 };
						xmlhttp.open("GET","/phpFiles/realTimeData/realTimeData.php",true);
						xmlhttp.send();
						setTimeout(getRealTimeData,5000);
						
}