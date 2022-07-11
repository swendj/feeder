#!/usr/bin/env python
# -*- coding: utf-8 -*-

#*****************************************************************************
#
# This is the "automatic feeder" script.
#
# Module        : main module, feed.py
# Author        : Swen Hopfe (dj)
# Design        : 2022-04-30
# Last modified : 2022-05-04
#
# The python script works on Raspberry Pi 2/.../Zero W
# with PiCam and servo MG90S.
#
#*****************************************************************************

import RPi.GPIO as GPIO
import sys
from time import sleep
from picamera import PiCamera, Color
from datetime import datetime


#-----------------------------------------------------------------------------

def blink(times, pause):
    GPIO.setmode(GPIO.BCM) # set GPIO mode
    GPIO.setup(21, GPIO.OUT) # GPIO 21 as output
    i = 0
    while i < times:
        GPIO.output(21, GPIO.HIGH)
        sleep(pause)
        GPIO.output(21, GPIO.LOW)
        sleep(pause)
        i = i + 1
    GPIO.cleanup() #cleanup GPIOs


def feed(cycle):
    GPIO.setmode(GPIO.BCM) # set GPIO mode
    GPIO.setup(17, GPIO.OUT) # GPIO 17 as output
    p = GPIO.PWM(17, 50) # pin 17 as PWM with 50Hz
    p.start(7) # start with 90 degrees (7 is middle for MG90S)
    p.ChangeDutyCycle(cycle) # turn to right (cycle=10, tube1) or left (cycle=4, tube2)

    sleep(1)
    p.ChangeDutyCycle(7) # middle (90 degrees) again

    sleep(0.5)
    p.stop() # stop PWM signal
    GPIO.cleanup() #cleanup GPIOs
    sleep(9)


def fcam():
    camera = PiCamera()

    now = datetime.now()
    dstr = now.strftime(" %d.%m.%Y  %H:%M:%S ")

    camera.resolution = (2592, 1944)
    camera.vflip = True
    camera.hflip = True
    camera.annotate_foreground = Color('white')
    camera.annotate_background = Color('black')
    camera.annotate_text_size = 128
    camera.annotate_text = dstr
    sleep(5)
    camera.capture('/var/www/html/view.jpg')

#-----------------------------------------------------------------------------

if sys.argv[1] == "0":
    blink(1,1)
    fh = open('/var/www/html/action.txt','r')
    for line in fh:
        if line == "1":
            sleep(0.5)
            blink(1,0.5)
            feed(10)
            fcam()
        if line == "2":
            sleep(0.5)
            blink(2,0.5)
            feed(4)
            fcam()
        if line == "3":
            sleep(0.5)
            blink(3,0.2)
            fcam()
    fh.close()
    fh = open('/var/www/html/action.txt','w')
    fh.write("0")
    fh.close()

#-----------------------------------------------------------------------------

if sys.argv[1] == "1":
    feed(10)
    fcam()
if sys.argv[1] == "2":
    feed(4)
    fcam()

#-----------------------------------------------------------------------------

if sys.argv[1] == "3":
    fcam()

#*****************************************************************************

