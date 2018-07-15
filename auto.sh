#!/bin/sh

generate () {
        webdir="/var/www/html"
        cp /etc/openvpn/client-template.txt $webdir/$1.ovpn
        echo "<ca>" >> $webdir/$1.ovpn
        cat /etc/openvpn/easy-rsa/pki/ca.crt >> $webdir/$1.ovpn
        echo "</ca>" >> $webdir/$1.ovpn
        echo "<cert>" >> $webdir/$1.ovpn
        cat /etc/openvpn/easy-rsa/pki/issued/$1.crt >> $webdir/$1.ovpn
        echo "</cert>" >> $webdir/$1.ovpn
        echo "<key>" >> $webdir/$1.ovpn
        cat /etc/openvpn/easy-rsa/pki/private/$1.key >> $webdir/$1.ovpn
        echo "</key>" >> $webdir/$1.ovpn
        echo "key-direction 1" >> $webdir/$1.ovpn
        echo "<tls-auth>" >> $webdir/$1.ovpn
        cat /etc/openvpn/tls-auth.key >> $webdir/$1.ovpn
        echo "</tls-auth>" >> $webdir/$1.ovpn
}

                        var=`date +%s%N` # I am fully aware that I can use /dev/random. I choose using this because the chances of two configs generated in the same nanosecond are highly unlikely.
                        cd /etc/openvpn/easy-rsa/
                        ./easyrsa build-client-full $var nopass
                        generate "$var"
                        echo "http:///$var.ovpn"
exit
;;
