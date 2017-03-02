#!/bin/bash
#nächtlicher Reboot vom Pi
#28/02/17 by HWS
VAR="starte jetzt neu!"
API="$(cat html/pushbullet.txt)"
MSG="$VAR"
DATE="Neustart"
curl -u $API: https://api.pushbullet.com/v2/pushes -d type=note -d title="$DATE" -d body="$MSG"
/sbin/reboot
