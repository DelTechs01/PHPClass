import mysql.connector
conn = mysql.connector.connect(
    host = "localhost",
    port = "specify your port",
    user = "root",
    password = "enter your password"
)

cursor = conn.cursor()
cursor.execute("CREATE DATABASE IF NOT EXISTS kyu_db")
conn.database = "kyu_db"
cursor.execute("CREATE TABLE IF NOT EXISTS unit (UNITCODE VARCHAR(10) PRIMARY KEY, UNITNAME VARCHAR(255) NOT NULL)")
query = "INSERT INTO unit(UNITCODE, UNITNAME) VALUES(%s, %s)"
data = [
    ("SSE2304", "SERVER SIDE PROGRAMMING")
]

try :
    cursor.executemany(query,data)
    conn.commit()
    print("Records inserted successfully.")
except mysql.connector.IntegrityError:
    print("Record already exists.")

cursor.close()
conn.close()