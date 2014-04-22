
$(document).ready(function() 
 {
$( ".forms" ).on("submit",function(e){
	 /* Stop form from submitting normally */
    e.preventDefault();
 
   
    var $form = $(this);
    var id = $form.attr('id');
    /* Get some values from elements on the page: */
    var values = $(this).serialize();
    document.getElementById("error"+id).innerHTML= "";
    	
    	for(var itter = 0; itter < 4; itter++)
    	{
    	  var nameL = "room["+id+"][lightingRemove"+itter+"]";
    	  var nameH = "room["+id+"][heatingRemove"+itter+"]";
    	  
    	  var heatingOn =  "room["+id+"][heatingOn"+itter+"]"; 
    	  var heatingOff =  "room["+id+"][heatingOff"+itter+"]";;
    	  var lightingOff =  "room["+id+"][lightingOn"+itter+"]";
    	  var lightingOn =  "room["+id+"][lightingOff"+itter+"]";
    	  var lightingRepeat = "room["+id+"][lightingRepeat"+itter+"]";
    	  var heatingRepeat = "room["+id+"][heatingRepeat"+itter+"]";
    	  var arrChkBoxL = document.getElementsByName(nameL)[0].checked;
    	  var arrChkBoxH = document.getElementsByName(nameH)[0].checked;
    	  
    	  
    	  
    	  if(arrChkBoxL)
    	  {
    		  document.getElementsByName(lightingOn)[0].value = '';
    		  document.getElementsByName(lightingOff)[0].value = '';
    		  document.getElementsByName(nameL)[0].checked = false;
    		  document.getElementsByName(lightingRepeat)[0].checked = false;
    	  }
    	  
    	  if(arrChkBoxH)
    	  {
    		  document.getElementsByName(heatingOn)[0].value = '';
    		  document.getElementsByName(heatingOff)[0].value = '';
    		  document.getElementsByName(nameH)[0].checked = false;
    		  document.getElementsByName(heatingRepeat)[0].checked = false;
    	  }
    	 
    	 
    	
    		
    	}
    	
   
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
		  			document.getElementById("error"+id).innerHTML= "<h2><i>"+xmlhttp.responseText+"</i></h2>";
		  			
		  			
		  			if(xmlhttp.responseText.indexOf("error") != -1)
		  			{
		  				//alert(xmlhttp.responseText);
		  				//document.getElementById("error"+id).innerHTML= "<h2><i>"+xmlhttp.responseText+"</i></h2>";
		  			}
		  			
		  			
			    	
		    	}
		 	 };
		 	
		 	var url = "phpFiles/eventScheduleRework.php?room_num="+id+"&";
		 	url = url+values;
			xmlhttp.open("get",url,true);
			xmlhttp.send();
       
	
});
$( ".forms" ).on("reset",function(e){
	 /* Stop form from submitting normally */
   e.preventDefault();

  
   var $form = $(this);
   var id = $form.attr('id');
   /* Get some values from elements on the page: */
   //var values = $(this).serialize();
   $(this).find('input:text, input:password, input:file, select, textarea').val('');
   
   document.getElementById("error"+id).innerHTML= "";
   
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
		    	}
		 	 };
		 	
		 	var url = "phpFiles/eventScheduleRework.php?room_num="+id+"&";
			xmlhttp.open("get",url,true);
			xmlhttp.send();
      
	
});
$( ".timePicker" ).datetimepicker({ 
	  
	 
	 // var endDateTextBox =  $( this ).next();
		timeFormat: 'HH:mm ',
		dateFormat: 'dd-mm-yy',
		 /*
		onClose: function(dateText, inst) {
			
			if (endDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					endDateTextBox.datetimepicker('setDate', testStartDate);
			}
			else {
				endDateTextBox.val(dateText);
			}
			
		//	endDateTextBox.val('') ;
		},
		onSelect: function (selectedDateTime){
			endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
		}
	});
 endDateTextBox.datetimepicker({ 
	//	timeFormat: 'HH:mm ',
	//	onClose: function(dateText, inst) {
	//		if (startDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					startDateTextBox.datetimepicker('setDate', testEndDate);
			}
			else {
				startDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
		}*/
	});
 });
