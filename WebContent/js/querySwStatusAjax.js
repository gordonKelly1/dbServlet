function getSwStatusAjax()
{
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
		  			
		  			
		  			var jsonObject = JSON.parse(xmlhttp.responseText);
		  		  //  alert(JSON.stringify(jsonObject));
			    	
		  			document.getElementById("light0").checked = parseInt(jsonObject.room1_lightSw_on) ;
		  			document.getElementById("heat0").checked = parseInt(jsonObject.room1_heatSw_on) ;
		  			document.getElementById("light1").checked = parseInt(jsonObject.room2_lightSw_on) ;
		  			document.getElementById("heat1").checked = parseInt(jsonObject.room2_heatSw_on) ;
		  			document.getElementById("light2").checked = parseInt(jsonObject.room3_lightSw_on) ;
		  			document.getElementById("heat2").checked = parseInt(jsonObject.room3_heatSw_on) ;
		  			document.getElementById("light3").checked = parseInt(jsonObject.room4_lightSw_on) ;
		  			document.getElementById("heat3").checked = parseInt(jsonObject.room4_heatSw_on) ;
		    	}
		 	 };
		 	
		 	var url = "phpFiles/swStatusAjaxQuery.php";
			xmlhttp.open("get",url,true);
			xmlhttp.send();
}