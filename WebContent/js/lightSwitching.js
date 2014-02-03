$(document).ready(function(){
	
$("input").change(function() {
	
		//alert("hello");
	   var element = event.target.id;
	   var on_off = $(this).is(":checked");
	  
	   
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
		  			alert(xmlhttp.responseText);
		  			//alert("light"+jsonObject.light + "is " + on_off);
			    	document.getElementById("on_off").innerHTML=parseFloat(jsonObject.humidity1).toFixed(2);
		    	}
		 	 };
		 	
		 	var data = "light="+element+"&on_off="+on_off;
		 	var url = "/phpFiles/lighting/lightingSwitch.php?";
		 	url = url+data;
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
	  
});
});
