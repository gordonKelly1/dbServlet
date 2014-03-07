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
  $result = null;
  $result = mysqli_query($con,"SELECT humidity, tstamp FROM sensor2 order by entryID" );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	$dataHumidity1[] = $row[humidity];
  	$tstamp1[]=$row[tstamp];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function humidity1() {
    $('#roomHumidity').highcharts({
           chart: {
        zoomType: 'x',
        spacingRight: 20
        },
       title: {
            text: 'Room Humidity Data',
            x: -20 //center
        },
        subtitle: {
            text: '        ',
            x: -20
        },
        credits: {
            enabled: false
        },
        xAxis: {
            type: 'datetime',
             maxZoom: 3600000, // fourteen days
        },
        yAxis: {
            title: {
                text: 'Humidity %'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
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
        name: 'Humidity',
        type: 'area',
        data: [<?php $element = 0;foreach($dataHumidity1 as $val)
        {
        	echo '['.($tstamp1[$element]*1000).',';
			printf("%.1f",$val);
			echo '],';
        	$element = $element + 1;
		}?>]
    }]
    });
   
};

</script>