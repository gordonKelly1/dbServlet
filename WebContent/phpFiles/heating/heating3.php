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
  $result = mysqli_query($con,"SELECT temp2, heating_on,tstamp, heating_limit FROM sensor3 Where tstamp >= ".$epochMinus24." order by entryID asc limit 86400" );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	$dataTemp3[] = $row[temp2];
  	$dataOnOff3[] = $row[heating_on];
  	$tstamp3[]=$row[tstamp];
  	$tempLimit3[] = $row[heating_limit];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function heating3() {
    $('#containerSensor3').highcharts({
           chart: {
        zoomType: 'x',
        spacingRight: 20
        },
       title: {
            text: 'Room Temperature Data',
            x: -20 //center
        },
        credits: {
            enabled: false
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
                width: 1,
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
        tooltip: {
            valueSuffix: '°C'
        },
        data: [<?php $element = 0;foreach($dataTemp3 as $val)
        {
        	{
        		echo '['.($tstamp3[$element]*1000).',';
        		printf("%.1f",$val);
        		echo '],';
        		$element = $element + 1;
        	}
		}?>]
    }, {
        name: 'Level',
        tooltip: {
            valueSuffix: '°C'
        },
        data: [<?php $element = 0;foreach($tempLimit3 as $val)
        {
        	echo '['.($tstamp2[$element]*1000).',';
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
        data: [<?php $element = 0;foreach($dataOnOff3 as $val)
        {
        	echo '['.($tstamp3[$element]*1000).','.$val.'],';
        	$element = $element + 1;
		}?>]
    }]
    });
   
};

</script>


