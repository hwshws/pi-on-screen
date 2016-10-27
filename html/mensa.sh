#!/bin/bash
#Speiseplan in csv umwandeln und tagesaktuell in Dateien schreiben; mittag.txt und abend.txt werden von USB ausgelesen
#HWS 15.10.16/26.10.16
#INFO: in crontab packen und täglich abrufen
date=`date +%u`
if [ $date -eq 1 ]; then #montag
  #wget #Datei von HP TODO: Date mit Goe
  #TODO: xls in xlsx umwandeln, bzw. eine andere Möglichkeit finden Viell. Webservice?
  xlsx2csv -d$ -s2 Speiseplan.xlsx > essen.csv
  #INFO: date +%u
  cut -d$ -f2 essen.csv > 1.txt
  cut -d$ -f3 essen.csv > 2.txt
  cut -d$ -f4 essen.csv > 3.txt
  cut -d$ -f5 essen.csv > 4.txt
  cut -d$ -f6 essen.csv > 5.txt
  sed '1,1d' $date.txt -i #entfernt die erste Zeile
  sed '1,1d' $date.txt -i #entfernt die erste Zeile
  sed 's/^[ \t]*//' $date.txt -i #entfernt führende Leerzeichen
  sed 's/ \+/ /g' $date.txt -i #entfernt überflüssige Leerzeichen
  sed '/./!d' $date.txt -i #entfernt Leerzeilen
  sed 's/$/<br>/' $date.txt -i
  head $date.txt -n 3 > mittag.txt #Überprüfen
  tail $date.txt -n 1 > abend.txt  #Überprüfen
  #IDEA: Ergebnis als Mail an HWS zur Kontrolle und bei Bedarf Korrektur

else #Di-Fr

  sed 's/^[ \t]*//' $date.txt -i #entfernt führende Leerzeichen
  sed 's/ \+/ /g' $date.txt -i #entfernt überflüssige Leerzeichen
  sed 's/$/<br>/' $date.txt -i
  head $date.txt -n 3 > mittag.txt #Überprüfen
  tail $date.txt -n 1 > abend.txt #Überprüfen
fi
