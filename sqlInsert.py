import mysql.connector

# Open database connection
db = mysql.connector.connect(host="192.168.0.131", user="phiric21", passwd="password", db="school")

# prepare a cursor object using cursor() method
cur = db.cursor(dictionary=True)

# create table
sql = "INSERT INTO students (name, age, gradeLevel) VALUES ('Jerome', '15', '10')"

cur.execute(sql)

rows = cur.fetchall()
for row in rows:
	print("Name: "+str(row['name']) + " Age: " +str(row['age']) + " Grade Level: " +str(row['gradeLevel']))

# disconnect from server
cur.close()
db.close()
