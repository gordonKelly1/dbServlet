<?php
class Sensor2Data{
	public $light ="";
	public $on_off = "";
}

$e = new Sensor2Data();
$e->light = $_GET['light'];
$e->on_off = $_GET['on_off'];

$json_obj = json_encode($e);
header('Content-Type: application/json');
echo $json_obj;
?>