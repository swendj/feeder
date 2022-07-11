# Automatic feeder
Software for an automatic fish feeder for the aquarium, realized with Raspberry Pi and Python3, controlling a servo MG90 and PiCam. 

"feed.py" is the main control script on the Pi. Putting that in a separate directory ("/home/pi/scripts"), you can control the feeder using the Pi's crontab as follows: 

### Crontab
#sunday till friday <br>
0 17 * * 0-5 python /home/pi/scripts/feed.py 1 <br>
#saturday <br>
0 17 * * 6   python /home/pi/scripts/feed.py 2 <br>
#every minute <br>
*/1 * * * *  python /home/pi/scripts/feed.py 0 <br>

### Local web
After installation of a HTML server (Lighty) on the Pi, please place "index.php" and "action.txt" in its document root "var/www/html".
If that was successful, you can see the web frontend as shown in the image gallery.

### Images
Images in the image directory are:

feeder.jpg    - working feeder <br>
scheme.jpg    - connection scheme <br>
mechanics.jpg - mechanics in the feeding towers <br>
web.jpg       - web frontend <br>





