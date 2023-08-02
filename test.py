
import socket

HOST = "127.0.0.1"  # The server's hostname or IP address
PORT = 1345  # The port used by the server

with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.connect((HOST, PORT))
    s.sendall(b"\x00Hello")

    while True:
        i = input()
        if int(i) == 1:
           s.sendall(b"\x00Hello") 
        data = s.recv(1024)
        print(data)

print(f"Received {data!r}")