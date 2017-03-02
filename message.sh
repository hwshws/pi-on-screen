#!/bin/bash
cd /home/pi/vplan/html
curl -O http://www.h-ws.de/message.txt
DATE=$(date +%Y-%m-%d%H-%M-%S)
echo "$DATE - message.txt geholt" >>log.log
