import mysql.connector
conn = mysql.connector.connect(
    host = 'localhost',
    port = '',
    user = 'root',
    password = '',
    database = 'salesdb'
)

mycursor = conn.cursor()
mycursor.execute("SELECT * FROM employees")
results = mycursor.fetchall()
print(results)

mycursor.execute("SELECT * FROM employees WHERE officeCode = 6")
result = mycursor.fetchall()
print(result)