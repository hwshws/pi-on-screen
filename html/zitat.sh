#!/bin/bash
name="zitatdestages"
Folder="/home/pi/vplan/html"
# Folder="/home/heinz-wilhelm/pi-on-screen/html"
cd ${Folder}
a=0
curl -O http://www.zitate-online.de/zitatdestages.txt
sed '$d' -i ${name}.txt
sed '$d' -i ${name}.txt
sed '1,1d' -i ${name}.txt
sed -e 's/<[^>]*>//g' -i ${name}.txt
# soweit... Sendung des Strings
#cat ${name}.txt
a="$(sed 's/[;&]/./g' ${name}.txt)"
VAR="$(cat ${name}.txt)"
echo $a
API="$(cat pushbullet.txt)"
MSG=$a
#MSG="$(cat ${name}.txt)"
DATE="$i"

curl -u $API: https://api.pushbullet.com/v2/pushes -d type=note -d title="Zitat des Tages" -d body="$MSG"


# TODO: Ausführung nachts via CronJob
