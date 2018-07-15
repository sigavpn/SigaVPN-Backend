<?php
error_reporting(0);
include '/var/ssh.php';
$string=shell_exec("sudo sshpass -p ".$passwd." ssh [username]@[openvpn server ip] 'sh /var/www/html/auto.sh' 2>&1"); 
$vpn=strstr($string, 'http');
$final=substr($vpn,0,46);
header('Location: '.$final);
echo $final;
?>
