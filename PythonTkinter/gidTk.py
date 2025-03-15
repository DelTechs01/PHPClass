from tkinter import *
root = Tk()
myLabel1 = Label(root, text="Hello World").grid(row=0, column=0)
myLabel2 = Label(root, text="My Name is Bleah Malika").grid(row=0, column=1)
myLabel3 = Label(root, text=" Hi Speedy!").grid(row=1, column=2)
#Method 2
#myLabel1.grid(row=0, column=0)
#myLabel2.grid(row=0, column=1)
#myLabel3.grid(row=2, column=0)

root.mainloop()