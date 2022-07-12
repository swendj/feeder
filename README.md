# Automatic feeder

### Explanation
This is software for an automatic fish feeder for the aquarium, realized with Raspberry Pi and Python3, controlling a servo MG90 and PiCam. 

### Main script
"feed.py" is the main control script on the Pi. Putting that in a separate directory ("/home/pi/scripts"), you can control the feeder using the Pi's crontab as follows: 

### Crontab
#sunday till friday <br>
0 17 * * 0-5 python /home/pi/scripts/feed.py 1 <br>
#saturday <br>
0 17 * * 6   python /home/pi/scripts/feed.py 2 <br>
#every minute <br>
*/1 * * * *  python /home/pi/scripts/feed.py 0 <br>

### Web
After installation of a HTML server (Lighty) on the Pi, please place "index.php" and "action.txt" in its document root "var/www/html". If that was successful, easily type the IP address of your Pi in the browsers bar and you should see the web frontend as shown in the image gallery.
If internet access is desired, your Pi must be enabled in the router and given a permanent IP address using a DynDNS service.

### Parts list
- Raspberry Pi Zero W (1/2)
- PiCam R1.3 or higher
- RPi and cam housing
- PiCam connection cabel
- Servo (MG90)
- PCB, buttons, LED, some resistors
- Homemade feeding tower

### Figures
Images in the image directory are:

feeder.jpg    - working feeder <br>
scheme.png    - connection scheme <br>
mechanics.png - mechanics in the feeding towers <br>
web.png       - web frontend <br>





