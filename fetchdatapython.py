import mysql.connector
mydb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    port = 3310,
    password = "@Password01",
    database = "kyu_db"
)

cursor = mydb.cursor()
cursor.execute("SELECT * FROM unit")
bleah = cursor.fetchone()
for i in bleah:
    print(i)