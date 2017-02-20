#!/bin/bash
#Speiseplan in csv umwandeln und tagesaktuell in Dateien schreiben; mittag.txt und abend.txt werden von USB ausgelesen
#HWS 15.10.16/26.10.16/20.02.17
#INFO: in crontab packen und täglich abrufen
date=`date +%u`
if [ $date -eq 1 ]; then #montag
  rm Speiseplan.xlsx #von letzter Woche
  wget http://h-ws.de/Speiseplan.xlsx
  libreoffice --convert-to xlsx Speiseplan.xls --headless #Umwandlung xls in xlsx
  xlsx2csv -d$ -s2 Speiseplan.xlsx > essen.csv
  #INFO: date +%u
for (( i = 1; i < 6; i++ )); do
    j=$(($i + 1)) #Verschiebung um eine Stelle
    cut -d$ -f$j essen.csv > $i.txt
    sed '1,1d' $i.txt -i #entfernt die erste Zeile
    sed '1,1d' $i.txt -i #entfernt die erste Zeile
    sed 's/^[ \t]*//' $i.txt -i #entfernt führende Leerzeichen
    sed 's/ \+/ /g' $i.txt -i #entfernt überflüssige Leerzeichen
    sed '/./!d' $i.txt -i #entfernt Leerzeilen
   sed 's/$/<br>/' $i.txt -i #Zeilenumbruch am Zeilenende
  done
  head $date.txt -n 3 > mittag.txt
  tail $date.txt -n 1 > abend.txt

  for (( i = 1; i < 6; i++ )); do
    VAR="$(cat $i.txt)"
    API="$(cat pushbullet.txt)"
MSG="$VAR"
DATE="$i"

curl -u $API: https://api.pushbullet.com/v2/pushes -d type=note -d title="$DATE" -d body="$MSG"

done

else #Di-Fr

  head $date.txt -n 3 > mittag.txt #Überprüfen
  tail $date.txt -n 1 > abend.txt #Überprüfen
fi
