 <?php
// Create connection
 $date = new DateTime();
 $epoch = $date->getTimestamp();
 $epochMinus24 = $epoch - (3600*24);
 echo $epochMinus24;
 
 $con=mysqli_connect("localhost","root","miltown1","db1");

// Check connection
 if (mysqli_connect_errno())
 {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT temp2, heating_on FROM sensor2 Where tstamp >= ".$epochMinus24." order by entryID asc limit 86400" );
 // echo mysqli_query($con,"SELECT * FROM sensor2 Where tstamp <= ".$epochMinus24." order by entryID desc limit 86400" );
  while($row = mysqli_fetch_array($result))
  {
  	$dataTemp2[] = $row[temp2];
  	$dataOnOff2[] = $row[heating_on];
  }
  
  mysqli_close($con);
?>
<script type="text/javascript">
$(function () {
    $('#containerSensor2').highcharts({
           chart: {
        zoomType: 'x',
        spacingRight: 20
        },
       title: {
            text: 'Room Temperature Data',
            x: -20 //center
        },
        subtitle: {
            text: 'Red area heating on',
            x: -20
        },
        xAxis: {
            type: 'datetime',
             maxZoom: 3600000, // fourteen days
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
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
        name: 'Temp',
        pointInterval: 60 * 1000,
        pointStart: <?PHP echo $epochMinus24*1000 ?> ,
        data: [<?php echo join($dataTemp2, ',') ?>]
    }, {
        name: 'Level',
        pointInterval: 60 * 1000,
        pointStart: <?PHP echo $epochMinus24*1000 ?>,
        data: []
          
    },{
        name: 'on/off',
        type: 'area',
        pointInterval: 60 * 1000,
        pointStart:<?PHP echo $epochMinus24*1000 ?>,
        color: '#FF0000',
        fillOpacity: 0.5,
        data: [<?php echo join($dataOnOff2, ',') ?>]
    }]
    });
});

</script>


