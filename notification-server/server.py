import tornado.httpserver
import tornado.websocket
import tornado.ioloop
import tornado.web
import socket
import mysql.connector
from mysql.connector import  Error
import time
from threading import Thread
import asyncio
from datetime import datetime



class MyWebSocketServer(tornado.websocket.WebSocketHandler):
    thread = None
    stop_threads = True
    def make_notification(self, id, type, description):
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


    def update_db(self, id):
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

            cursor.execute("SELECT * FROM `Notifica` WHERE IdUtente = (%s) AND Letto = 0 ORDER BY -IdNotifica LIMIT 1", (id,))
            row = cursor.fetchone()
            while row is not None:
                print(row)
                return row

        except Error as e:
                print("ERROR", e)

        cursor.close()
        mydb.close()




    def thread_update_db(self, loop, id):
            asyncio.set_event_loop(loop)
            notification = self.update_db(id)
            while(self.stop_threads):
                if notification != self.update_db(id):
                    notification = self.update_db(id)
                    self.write_message("update_notification")
                    if notification[1] == "Order Processed":
                        time.sleep(4)
                        self.make_notification(id, "Order Shipped", "Your order has been  shipped")
                    elif notification[1] == "Order Shipped":
                        time.sleep(4)
                        self.make_notification(id, "Order Delivered", "Order successfully delivered, go to <a href='../profile.php'>Profile</a> to check it")
                time.sleep(3)



    def open(self):
        print('new connection')
        self.write_message("ws connection stable")

    def on_message(self, message):
        print('Message: %s' % message)
        userID = message
        loop = asyncio.new_event_loop()
        self.thread = Thread(target = self.thread_update_db, args = (loop,userID,))
        self.thread.start()

    def on_close(self):
        print('close connection')
        self.stop_threads = False
        self.thread.join()



    def check_origin(self, origin):
        return True


application = tornado.web.Application([
    (r'/notification', MyWebSocketServer),
])
if __name__ == "__main__":
    http_server = tornado.httpserver.HTTPServer(application)
    http_server.listen(8000)
    tornado.ioloop.IOLoop.instance().start()