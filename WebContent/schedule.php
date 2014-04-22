
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="cssIndex3.css">
 <link rel="stylesheet" href="/resources/style.css">
 <link rel="stylesheet" href="/resources/jquery-ui.css">
<title>Home auto</title>
<script type="text/javascript">
var room = new Array();
function change(color,textcolor) { 
	var el=event.srcElement;
		 event.srcElement.style.backgroundColor=color;
		 event.srcElement.style.color = textcolor;
}</script>
 <script src="//code.jquery.com/jquery-1.9.1.js"></script>
 <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <script src="js/timePicker.js"></script>
 <script src="js/eventScheduleAjax.js"></script>

<title>Insert title here</title>
<script type="text/javascript">

</script>
<?php 
 include("phpFiles/setScheduleFieldsOnPage.php");
 ?>
</head>
<body onload="setScheduleFields();">
<div class = "banner">
 		<img src="logo.png" width="50%" align="middle">
</div>
 <div  style = "width:100%;height:40px;color:yellow"  >
	<form action="homePage.php" style="color:yellow;background-color: #24243F" >
    <input type="submit" value="Home Page" style="color:yellow;background-color: #24243F" onmouseover="change('#333399')" onmouseout="change('#24243F')">
	</form>
 </div>
<div>
<?php for ($x = 0; $x < 4;$x++) :?>

  <div style = "text-align:center;color:yellow;"><h1>Room <?php echo $x+1;?></h1></div>
    <form class="forms" id =<?php echo $x;?>>
    <table width = "100%">
  	<tr>
  	  <td width="20%"></td>
  	  <td >
	 	 <fieldset class = "dataField">
	 	 <legend style="color:yellow">lighting</legend>
	 	 	
			<table width="100%" style="color:yellow; text-align: center;">
			 	<tr>
			 		<td>On Time</td><td>Off Time</td><td>Repeat</td><td>Remove</td>
			 	</tr>
				<?php
			    for($i = 0; $i < 4; $i++)
			    {
			    	echo "<tr>";
				   	echo "<td><input type=\"text\"  name=\"room[".$x."][lightingOn".$i."]\" class = \"timePicker\" ></td>";
				   	echo "<td><input type=\"text\" name=\"room[".$x."][lightingOff".$i."]\" class = \"timePicker\"></td>";
				   	echo "<td><input type=\"checkbox\"  name=\"room[".$x."][lightingRepeat".$i."]\"></td>";
				   	echo "<td><input type=\"checkbox\"  name=\"room[".$x."][lightingRemove".$i."]\"></td>";
				   	echo "</tr>";
			    }
               ?>
              
			</table>
		</fieldset>
	  </td>
	  <td></td>
	  <td colspan = 2>
	 	 <fieldset class = "dataField">
	 	 <legend style="color:yellow">Heating</legend>
			<table width="100%" style="color:yellow; text-align: center;">
			 	<tr>
			 		<td>On Time</td><td>Off Time</td><td>Repeat</td><td>Remove</td>
			 	</tr>
			 	<?php
			    for($i = 0; $i < 4; $i++)
			    {
			    	echo "<tr>";
				   	echo "<td><input type=\"text\"  name=\"room[".$x."][heatingOn".$i."]\" class = \"timePicker\"></td>";
				   	echo "<td><input type=\"text\"  name=\"room[".$x."][heatingOff".$i."]\" class = \"timePicker\"></td>";
				   	echo "<td><input type=\"checkbox\"  name=\"room[".$x."][heatingRepeat".$i."]\"></td>";
				   	echo "<td><input type=\"checkbox\"  name=\"room[".$x."][heatingRemove".$i."]\"></td>";
				   	echo "</tr>";
			    }
               ?>
			</table>
		
		</fieldset>
		<td width="20%"></td>
	  </td>
	</tr>
	<tr>
        <td></td>
		<td align = "center"><input onmouseover="change('#24243F','yellow')" onmouseout="change('#ffffff','#000000')" type="submit" name = "submit <?php echo $x?>" value="Submit" class="sendForm"></td>
		<td></td>
			  
		
		<td align = "center"><input onmouseover="change('#24243F','yellow')" onmouseout="change('#ffffff','#000000')" type="reset" name = "clear <?php echo $x?>" value="Clear"></td>
		<td></td>
	</tr>
	<tr>
		<td id="error<?php echo $x;?>" style="color:red; text-align: center;" colspan = "6" >
		</td>
	</tr>
	<tr>
	<td colspan = "6"><div  style = "width:100%;height:2px;background-color:yellow;"></div> </td>
   </tr> 
 </table>
</form>
</div>
 
<?php endfor;?>
 
</body>
</html>