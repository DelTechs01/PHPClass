import mysql.connector
import tkinter as tk
from tkinter import *
myWindow = tk.Tk()
myWindow.geometry("400x250")

my_connect = mysql.connector.connect(
    host = "localhost",
    user = "root",
    port = "Your preffered port",
    password = "YOUR PASSWORD",
    database = "kyu_db"
)

my_conn = my_connect.cursor()
my_conn.execute("SELECT * FROM unit")
i = 0
for data in my_conn:
    for j in range(len(data)):
        e = Entry(myWindow, width = 40, fg='blue')
        e.grid(row = i, column = j)
        e.insert(END, data[j])
        i += 1
myWindow.mainloop()