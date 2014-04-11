
<script type="text/javascript">
function getHistoricalData(form){
			
					  	var xmlhttp;
					  	var from = form.from.value;
					  	var to = form.to.value;

					 if((to != "")&&(from != "")){

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
					  			var jsonArrays = new Array();
					  			
						  		var jsonObject = JSON.parse(xmlhttp.responseText);
						  		var chartData1=[];
						  		var chartData2=[];
						  		var chartData3=[];
						  		var chartData4=[];
						  		var chartData5=[];
						  		var chartData6=[];
						  		var heatingOn =0;
						  		var lightingOn= 0;
						  		
						  		
						  		for(var i =0; i <7;i++)
						  		{
						  			jsonArrays[i] = JSON.parse(jsonObject[i]);
						  		}

						  
						  		
						  		 var chart = $('#roomHeating').highcharts();
						          series = chart.series[0];
						          console.log(chart1A.series[0].data.length);
						          
						            var length = series.data.length;
						            console.log(length);
						            for(var i = 0; i < length;i++) {
						                chart1A.series[0].data[0].remove(false);
						                chart1A.series[1].data[0].remove(false);
						                chart1A.series[2].data[0].remove(false);
						                chart1B.series[0].data[0].remove(false);
						                chart1C.series[0].data[0].remove(false);
						                chart1C.series[1].data[0].remove(false);
						            }

						         

							  		 for (var key in jsonArrays[0]) {
							  			var dataPointArray = [];
							  			var dataPointArray2 = [];
							  			var dataPointArray3 = [];
							  			var dataPointArray4 = [];
							  			var dataPointArray5 = [];
							  			var dataPointArray6 = [];
							  			
						            	 dataPointArray.push(key*1000);
						            	 dataPointArray2.push(key*1000);
						            	 dataPointArray3.push(key*1000);
						            	 dataPointArray4.push(key*1000);
						            	 dataPointArray5.push(key*1000);
						            	 dataPointArray6.push(key*1000);

						            	 
									  	dataPointArray.push(parseFloat(jsonArrays[0][key]));
									  	dataPointArray2.push(parseFloat(jsonArrays[1][key]));
									  	dataPointArray3.push(parseFloat(jsonArrays[2][key]));
									  	dataPointArray4.push(parseFloat(jsonArrays[3][key]));
									  	dataPointArray5.push(parseFloat(jsonArrays[4][key]));
									  	dataPointArray6.push(parseFloat(jsonArrays[5][key]));

									  	
									  	if(parseFloat(jsonArrays[2][key]) != 0)
									  	{
										  	heatingOn++;
									  	}
									  	if(parseFloat(jsonArrays[4][key]) != 0)
									  	{
										  	lightingOn++;
									  	}
								
									  	
									  	chartData1.push(dataPointArray);
									  	chartData2.push(dataPointArray2);
									  	chartData3.push(dataPointArray3);
									  	chartData4.push(dataPointArray4);
									  	chartData5.push(dataPointArray5);
									  	chartData6.push(dataPointArray6);
								  		 
										 
								  		}
							  	chart1A.series[0].setData(chartData1);
							  	chart1A.series[1].setData(chartData2);
							  	chart1A.series[2].setData(chartData3);
							  	
							  	chart1B.series[0].setData(chartData4);

							  	chart1C.series[0].setData(chartData5);
							  	chart1C.series[1].setData(chartData6);

							  	
						        console.log("Size is ");
						        length = series.data.length;
						        console.log(chart1A.series[0].data.length);
						        
						        chart1A.redraw();
						        chart1B.redraw();
						        chart1C.redraw();

						        var electricityPrice = parseFloat(jsonArrays[6]["electricity_price"]);
						        var oilPrice = parseFloat(jsonArrays[6]["oil_price"]);
                                var lightingCost = (lightingOn*electricityPrice)/10;
						        var heatingOnPercent = (100/chart1A.series[0].data.length)*heatingOn;
						        var lightingOnPercent = (100/chart1A.series[0].data.length)*lightingOn;
						        var heatingCost = (heatingOn/60)*2.27*oilPrice;
						        
						        document.getElementById("error").innerHTML= "<h2><i>Data Loaded</i></h2>";
						        document.getElementById("heatingOnPeriod").innerHTML= "<h2><i>"+heatingOnPercent.toFixed(1)+"%</i></h2>";
						        document.getElementById("heatingOffPeriod").innerHTML= "<h2><i>"+(100-heatingOnPercent).toFixed(1)+"%</i></h2>";
						        document.getElementById("heatingTotal").innerHTML= "<h2><i>"+heatingOn+" mins</i></h2>";
						        document.getElementById("heatingCost").innerHTML= "<h2><i>"+heatingCost.toFixed(2)+"</i></h2>";
						        document.getElementById("lightingOnPeriod").innerHTML= "<h2><i>"+lightingOnPercent.toFixed(1)+"%</i></h2>";
						        document.getElementById("lightingOffPeriod").innerHTML= "<h2><i>"+(100-lightingOnPercent).toFixed(1)+"%</i></h2>";
						        document.getElementById("lightingTotal").innerHTML= "<h2><i>"+lightingOn+" mins</i></h2>";
						        document.getElementById("lightingCost").innerHTML= "<h2><i>"+lightingCost.toFixed(2)+"</i></h2>";
						        $("#tableStats").show();
						       
						  		
					    	}
					    	
					 	 };
					 	var data = "from="+from+"&to="+to+"&room_num="+room_num;
					 	var url = "/phpFiles/historicalData/getHistoricalData.php?";
					 	url = url+data;
					 	
						xmlhttp.open("GET",url,true);
						xmlhttp.send();

				}
					 else
					 {
						 document.getElementById("error").innerHTML= "<h2><i>must enter both fields</i></h2>"
					 }
						
}
</script>