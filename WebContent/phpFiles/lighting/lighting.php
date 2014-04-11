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

  $result = mysqli_query($con,"SELECT als, light_on, tstamp FROM sensor".$room_num." Where tstamp >= ".$epochMinus24." order by entryID asc limit 86400" );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	${"als".$room_num}[] = $row[als];
  	${"light_on".$room_num}[] = $row[light_on];
  	${"tstamp".$room_num}[]=$row[tstamp];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function <?php echo " lighting".$room_num;?>() {
	<?php echo " chart".$room_num."C";?> = new Highcharts.Chart({
           chart: {
        renderTo: <?php echo "'containerSensor".$room_num."C'";?>,
        zoomType: 'x',
        spacingRight: 20
        },
        credits: {
            enabled: false
        },
       title: {
            text: 'Room Lighting Data',
            x: -20 //center
        },
        xAxis: {
            type: 'datetime',
            maxZoom: 3600000, // fourteen days
        },
        yAxis: [{
            min: 0,
            max: 100,
            endOnTick:false,
            tickInterval: 25,
            title: {
                text: 'Ambient light level'
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
                 data: [<?php $element = 0;foreach(${"light_on".$room_num} as $val)
                 {
                 	echo '['.(${"tstamp".$room_num}[$element]*1000).','.$val.'],';
                 	$element = $element + 1;
         		}?>]
             }
                 ,{
        name: 'lums',
        yAxis: 0,
        tooltip: {
            valueSuffix: ' '
        },  
        data: [<?php $element = 0;foreach(${"als".$room_num} as $val)
        {
        	echo '['.(${"tstamp".$room_num}[$element]*1000).',';
			printf("%.1f",$val);
			echo '],';
        	$element = $element + 1;
		}?>],
    }]
    });
   
};

</script>


