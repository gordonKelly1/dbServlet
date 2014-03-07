<?php
//this php file takes a connection from the js file lightswitch.js connects to the python main program and sends string 
//of which button was pressed and where its new value
class Sensor2Data{
	public $element ="";
	public $value = "";
}

$e = new Sensor2Data();
$element = $_GET['element'];
$value = $_GET['value'];
$message = "".$element." ".$value;
$host = "127.0.0.1";
$port = "1888";
set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
socket_write($socket,$message, strlen($message))or die("Coyld not send data to server");
socket_close($socket);
$json_obj = json_encode($e);
//header('Content-Type: application/json');
echo "".$element." ".$value;
?>