<?php
// I really don't know why I still use this code. I'm aware that if you make PHP crash that shit WILL hit the fan. I'm fixing this ASAP.
error_reporting(0);
$string=shell_exec("sudo sshpass -p [openvpn server password] ssh [username]@[openvpn server ip] 'sh /var/www/html/auto.sh' 2>&1"); 
$vpn=strstr($string, 'http');
$final=substr($vpn,0,46);
header('Location: '.$final);
echo $final;
?>
