# automatic feeder
Software for an automatic feeder for the aquarium, realized with Raspberry Pi and Python.

"feed.py" is the main control script on the Pi. Putting that in a separate directory ("/home/pi/scripts"), you can control the feeder using the Pi's crontab as follows: 

.................................................................................. <br>
#sunday till friday <br>
0 17 * * 0-5 python3 /home/pi/scripts/feed.py 1 <br>
#saturday <br>
0 17 * * 6   python3 /home/pi/scripts/feed.py 2 <br>
#every minute <br>
*/1 * * * *  python3 /home/pi/scripts/feed.py 0 <br>
.................................................................................. <br>

After installation of a HTML server (Lighty) on the Pi, please place "index.php" and "action.txt" in its document root "var/www/html".   
