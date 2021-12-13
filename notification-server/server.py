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

def update_db(id):

    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="root"
    )
    cursor = mydb.cursor()
    try:
        cursor.execute("USE HYC")
        cursor.execute("SELECT * FROM Notifica")

        row = cursor.fetchone()

        while row is not None:
            print(row)
            return row

    except Error as e:
            print("ERROR", e)

    finally:
        cursor.close()
        mydb.close()



def thread_update_db(id, wb, loop):
        asyncio.set_event_loop(loop)
        notification = update_db(id)
        while(True):
            if notification != update_db(id):
                notification = update_db(id)
                wb.write_message("update_notification")
            time.sleep(3)



threads = []
class MyWebSocketServer(tornado.websocket.WebSocketHandler):

    def open(self):
        print('new connection')
        self.write_message("ws connection stable")

    def on_message(self, message):
        print('Message: %s' % message)
        userID = message
        loop = asyncio.new_event_loop()
        t = Thread(target = thread_update_db, args = (userID,self,loop))
        t.start()

    def on_close(self):
        print('close connection')


    def check_origin(self, origin):
        return True


application = tornado.web.Application([
    (r'/notification', MyWebSocketServer),
])
if __name__ == "__main__":
    http_server = tornado.httpserver.HTTPServer(application)
    http_server.listen(8000)
    tornado.ioloop.IOLoop.instance().start()