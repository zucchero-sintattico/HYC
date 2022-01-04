import mysql.connector
from mysql.connector import  Error
import time
import asyncio


def make_notification(id, type, description):
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="password",
      database='HYC',
      use_pure=False
    )
    cursor = mydb.cursor()
    try:
        now = datetime.today().strftime('%Y%m%d%H%M%S')
        cursor.execute("USE HYC")
        cursor.execute("INSERT INTO Notifica (TipoNotifica, Data, Descrizione, IdUtente, Letto) VALUES ((%s), (%s), (%s) , (%s), 0)", (type, now, description, id,))
        mydb.commit()
    except Error as e:
            print("ERROR", e)
    cursor.close()
    mydb.close()


def update_db():
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="password",
      database='HYC',
      use_pure=False
    )
    cursor = mydb.cursor()
    try:
        cursor.execute("USE HYC")

        cursor.execute("SELECT * FROM `Notifica`")
        row = cursor.fetchone()
        while row is not None:
            return row

    except Error as e:
            print("ERROR", e)

    cursor.close()
    mydb.close()




def thread_update_db():
        notification = update_db()
        while(1):
            if notification != update_db():
                notification = update_db()
                user = notification[4]
                if notification[1] == "Order Processed":
                    time.sleep(5)
                    make_notification(user, "Order Shipped", "Your order has been  shipped")
                elif notification[1] == "Order Shipped":
                    time.sleep(5)
                    make_notification(user, "Order Delivered", "Order successfully delivered, go to <a href='../profile.php'>Profile</a> to check it")
            time.sleep(3)



thread_update_db()