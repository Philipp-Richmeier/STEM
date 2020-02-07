import mysql.connector

# Open database connection
db = mysql.connector.connect(host="192.168.0.131", user="phiric21", passwd="richmeier", db="phiric21")

# disconnect from server
cur.close()
db.close()
