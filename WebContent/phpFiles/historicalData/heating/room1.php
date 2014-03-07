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
  $result = mysqli_query($con,"SELECT temp2, heating_on, tstamp, heating_limit FROM sensor1  order by entryID " );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	$dataTemp1[] = $row[temp2];
  	$dataOnOff1[] = $row[heating_on];
  	$tstamp1[]=$row[tstamp];
  	$tempLimit1[] = $row[heating_limit];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function heating1() {
    $('#roomHeating').highcharts({
           chart: {
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
        	max: 1,
            min: 0,
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
        name: 'Temp',
       
        
        data: [<?php $element = 0;foreach($dataTemp1 as $val)
        {
        	echo '['.($tstamp1[$element]*1000).',';
			printf("%.1f",$val);
			echo '],';
        	$element = $element + 1;
		}?>],
		 tooltip: {
	            valueSuffix: '°C'
	        },
    }, {
        name: 'Level',
        tooltip: {
            valueSuffix: '°C'
        },
        data: [<?php $element = 0;foreach($tempLimit1 as $val)
        {
        	echo '['.($tstamp1[$element]*1000).',';
			echo $val;
			echo '],';
        	$element = $element + 1;
		}?>]
          
    },{
        name: 'on/off',
        type: 'area',
        yAxis: 1,
        color: '#FF0000',
        fillOpacity: 0.5,
        data: [<?php $element = 0;foreach($dataOnOff1 as $val)
        {
        	echo '['.($tstamp1[$element]*1000).','.$val.'],';
        	$element = $element + 1;
		}?>]
    }]
    });
   
};

</script>


