import mysql.connector

# Open database connection
db = mysql.connector.connect(host="192.168.0.131", user="phiric21", passwd="richmeier", db="phiric21")

# prepare a cursor object using cursor() method
cur = db.cursor(dictionary=True)

# create table as per requirement
sql = "UPDATE students SET age = '12' WHERE name = 'Holy'"

cur.execute(sql)

# disconnect from server
cur.close()
db.close()
