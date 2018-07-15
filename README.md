# SigaVPN-Backend

In hopes that others will follow in our footsteps, I'm making the backend to this opensource. 


You will need:
sshpass
php
a webserver (preferably NGINX)
a openvpn server
bash
vim/nano
SSH password (not SSH key)


How to set it up: 

1. Set up an OpenVPN server
2. Make sure in `/etc/openvpn/server.conf` that `status` and `log-append` is set to `/dev/null`. Change `verb` to 0.
3. Make sure both the OpenVPN's web directory and Webserver have `access_log` and `error_log` set to `/dev/null`
4. On the OpenVPN server make sure you run `iptables -A FORWARD -i tun0 -o tun0 -j DROP` to block client 2 client OpenVPN traffic
5. Make a user that can run `auto.sh` or use `root`. The former is a much better idea.
6. Put `auto.sh` in the OpenVPN server's web directory
7. Modify `auto.sh` to your needs
8. Try `./auto.sh` to make sure an OpenVPN gets generated
9. Put `generate.php`on the webserver's web directory.
10. Modify `generate.php` to your needs 
11. Run `ssh (your openvpn server's IP)` from the webserver. Type yes when it asks. Don't actually SSH into the server, that was just to establish the authenticity of the host.
12. Run `php generate.php`

Going to generate.php from a web browser should redirect to a new ovpn file. 

This system was thrown together in about 48 hours and I never had a successful data breach even though I had a bounty for it.

