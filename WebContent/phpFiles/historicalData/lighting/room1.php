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

  $result = mysqli_query($con,"SELECT als, light_on, tstamp FROM sensor".$room_num." order by entryID asc limit 864");

  while($row = mysqli_fetch_array($result))
  {
  	$als1[] = $row[als];
  	$light_on1[] = $row[light_on];
  	$tstamp3[]=$row[tstamp];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
function lighting1() {
	chart1C = new Highcharts.Chart({
           chart: {
        renderTo: 'roomLighting',
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
                text: ''
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
                 data: [<?php $element = 0;foreach($light_on1 as $val)
                 {
                 	echo '['.($tstamp3[$element]*1000).','.$val.'],';
                 	$element = $element + 1;
         		}?>]
             }
                 ,{
        name: 'als',
        yAxis: 0,
        tooltip: {
            valueSuffix: ''
        },  
        data: [<?php $element = 0;foreach($als1 as $val)
        {
        	echo '['.($tstamp3[$element]*1000).',';
			printf("%.1f",$val);
			echo '],';
        	$element = $element + 1;
		}?>],
    }]
    });
   
};

</script>


