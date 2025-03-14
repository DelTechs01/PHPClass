import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    port=0000,
    user="root", 
    password="your password"
)

mycursor = mydb.cursor()
mycursor.execute("SHOW DATABASES")

for i in mycursor:
    print(i)
