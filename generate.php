<?php
error_reporting(0); //Turns off errors
include '/var/sshkeys.php'; //Don't want to leak the SSH password if PHP crashes
$string=shell_exec("sudo sshpass -p ".$passwd." ssh [username]@[openvpn server ip] 'sh /var/www/html/auto.sh' 2>&1"); //Runs auto.sh on the openvpn server
$vpn=strstr($string, 'http');//Cut everything before http
$final=substr($vpn,0,46);//Make $final just the URL
header('Location: '.$final);//redirects to the ovpn file
echo $final; //Just shows that it works if you run it via the php command
?>
