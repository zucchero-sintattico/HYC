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



class MyWebSocketServer(tornado.websocket.WebSocketHandler):
    thread = None
    stop_threads = True
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
            cursor.execute("SELECT * FROM `Notifica` WHERE IdUtente = %s AND Letto = 0 LIMIT 1", id)
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