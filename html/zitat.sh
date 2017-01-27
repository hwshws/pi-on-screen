#!/bin/bash
cd /home/pi/vplan/html
curl -O http://www.zitate-online.de/zitatdestages.txt
sed '$d' -i zitatdestages.txt
sed '$d' -i zitatdestages.txt
# TODO: Ausführung nachts via CronJob
