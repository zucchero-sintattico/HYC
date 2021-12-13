import tornado.httpserver
import tornado.websocket
import tornado.ioloop
import tornado.web
import socket
import mysql.connector
from mysql.connector import  Error
import time
from threading import Thread


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



class MyWebSocketServer(tornado.websocket.WebSocketHandler):

    def open(self):
        print('new connection')
        self.write_message("ws connection stable")

    def on_message(self, message):
        print('Message: %s' % message)
        userID = message
        notification = update_db(id)
        while(True):
            if notification != update_db(id):
                notification = update_db(id)
                self.write_message("update_notification")
            time.sleep(3)




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