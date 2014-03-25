 <?php
// Create connection
 $date = new DateTime();
 $epoch = $date->getTimestamp();
 $epochMinus24 = $epoch - (3600*24);
 
 
 $con=mysqli_connect("localhost","root","miltown1","db1");

// Check connection
 if (mysqli_connect_errno())
 {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT temp2, heating_on, tstamp, heating_limit FROM sensor".$room_num." Where tstamp >= ".$epochMinus24." order by entryID asc limit 86400" );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	${"dataTemp".$room_num}[] = $row[temp2];
  	${"dataOnOff".$room_num}[] = $row[heating_on];
  	${"tstamp".$room_num}[]=$row[tstamp];
  	${"tempLimit".$room_num}[] = $row[heating_limit];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function <?php echo " heating".$room_num;?>() {
	<?php echo " chart".$room_num."A";?> = new Highcharts.Chart({
           chart: {
        renderTo: <?php echo "'containerSensor".$room_num."A'";?>,
        zoomType: 'x',
        spacingRight: 20
        },
        credits: {
            enabled: false
        },
       title: {
            text: 'Room Temperature Data',
            x: -20 //center
        },
        xAxis: {
            type: 'datetime',
            maxZoom: 3600000, // fourteen days
        },
        yAxis: [{
            min: 0,
            max: 35,
            endOnTick:false,
            tickInterval: 10,
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        {
        	
            min: 0,
            max: 1,
            endOnTick:false,
            tickInterval: .25,
            tickLength: 0,
            title: {
                text: ''
            },
            labels: {
                enabled: false
            },
            plotLines: [{
                value: 0,
                width: 0,
                color: '#808080'
            }]
        }],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        plotOptions: {
        series: {
            marker: {
                enabled: false,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
        series: [ {
                 name: 'on/off',
                 type: 'area',
                 yAxis: 1,
                 color: '#FF0000',
                 fillOpacity: 0.5,
                 data: [<?php $element = 0;foreach(${"dataOnOff".$room_num} as $val)
                 {
                 	echo '['.(${"tstamp".$room_num}[$element]*1000).','.$val.'],';
                 	$element = $element + 1;
         		}?>]
             }
                 ,{
        name: 'Temp',
        yAxis: 0,
        tooltip: {
            valueSuffix: '°C'
        },  
        data: [<?php $element = 0;foreach(${"dataTemp".$room_num} as $val)
        {
        	echo '['.(${"tstamp".$room_num}[$element]*1000).',';
			printf("%.1f",$val);
			echo '],';
        	$element = $element + 1;
		}?>],
    }, {
        name: 'Level',
        yAxis: 0,
        tooltip: {
            valueSuffix: '°C'
        },
        data: [<?php $element = 0;foreach(${"tempLimit".$room_num} as $val)
        {
        	echo '['.(${"tstamp".$room_num}[$element]*1000).',';
			echo $val;
			echo '],';
        	$element = $element + 1;
		}?>]
          
    }]
    });
   
};

</script>


