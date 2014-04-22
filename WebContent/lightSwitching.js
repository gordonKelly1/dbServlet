$(document).ready(function(){
	
$("input").change(function() {
	
	 var value;
	 var element = event.target.id;
	 
	   if(element.indexOf("tempTreshold") == -1)  //do if element that caused event not tempTreshold
	   {
		   // value = document.getElementById(element).value;
		   value = $(this).is(":checked");
			   
			   
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
				  			//var jsonObject = JSON.parse(xmlhttp.responseText);
				  			//alert(xmlhttp.responseText);
				  			//alert("light"+jsonObject.light + "is " + on_off);
					    	
				    	}
				 	 };
				 	
				 	var data = "element="+element+"&value="+value;
				 	var url = "/phpFiles/lighting/lightingSwitch.php?";
				 	url = url+data;
					xmlhttp.open("GET",url,true);
					xmlhttp.send();
		   }
		      
});
$("input").mouseup(function() {
	
	
	
	 var value;
	 var element = event.target.id;
	   
	 if(element.indexOf("tempTreshold") != -1){   //if element that caused event is a tempTreshold event
		 value = document.getElementById(element).value;
		
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
			  			//var jsonObject = JSON.parse(xmlhttp.responseText);
			  			//alert(xmlhttp.responseText);
			  			//alert("light"+jsonObject.light + "is " + on_off);
				    	
			    	}
			 	 };
			 	
			 	var data = "element="+element+"&value="+value;
			 	var url = "/phpFiles/lighting/lightingSwitch.php?";
			 	url = url+data;
				xmlhttp.open("GET",url,true);
				xmlhttp.send();
				
	 		}
	   });
	   
	 
});  
	  


