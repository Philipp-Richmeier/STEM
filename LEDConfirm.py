import pymysql
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(18,GPIO.OUT)
            
light = []
db = pymysql.connect(host="localhost", user="root", passwd="password", db="lights")
db.autocommit(True)
# Create cursor
cur = db.cursor(pymysql.cursors.DictCursor)


def grabValue():
    sql = "SELECT * from led"

    cur.execute(sql)

    rows = cur.fetchmany(0)
 
    for row in rows:
        global light
        light = int(row["lToggle"])
        if light == 1:
            print("on")
            print("Light Value : " + str(light))
            print("LED on")
            GPIO.output(18,GPIO.HIGH)
        else:
            print("off")
            print("Light Value : " + str(light))
            print("LED off")
            GPIO.output(18,GPIO.LOW)

import time
starttime=time.time()
while True:
  print("-----")
  grabValue()
  time.sleep(1.0 - ((time.time() - starttime) % 1.0))
  



# close connection
cur.close()
db.close()