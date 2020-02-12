import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(18,GPIO.OUT)
if input("ON")
	print "LED on"
	GPIO.output(18,GPIO.HIGH)

else
	print "LED off"
	GPIO.output(18,GPIO.LOW)