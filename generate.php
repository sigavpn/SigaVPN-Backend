<?php
// WARNING: This code is kinda messy. Make sure this file is rate limited or protected from HTTP floods somehow.
error_reporting(0);
$string=shell_exec("sudo sshpass -p [openvpn server password] ssh root@[openvpn server ip] 'sh /var/www/html/auto.sh' 2>&1"); 
$vpn=strstr($string, 'http');
$final=substr($vpn,0,46);
header('Location: '.$final);
echo $final;
?>
