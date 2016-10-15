#!bin/bash
#Speiseplan in csv umwandeln und tagesaktuell in Dateien schreiben
#HWS 15.10.16
#INFO: in crontab packen und täglich abrufen
date=`date +%w`
if [ $date -eq 2 ]; then #montag
  #wget #Datei von HP TODO: Date mit Goe
  #TODO: xls in xlsx umwandeln, bzw. eine andere Möglichkeit finden
  xlsx2csv -d$ -s2 Speiseplan.xlsx > essen.csv
  cut -d$ -f2 essen.csv > gesamt.txt
  sed 's/^[ \t]*//' gesamt.txt -i #entfernt führende Leerzeichen
  sed 's/ \+/ /g' gesamt.txt -i #entfernt überflüssige Leerzeichen
  sed 's/$/<br>/' gesamt.txt -i
  head gesamt.txt -n 3 > mittag.txt
  tail gesamt.txt -n 1 > abend.txt
else
  dat=$(($date + 1))
  cut -d$ -f$dat essen.csv > gesamt.txt
  sed 's/^[ \t]*//' gesamt.txt -i #entfernt führende Leerzeichen
  sed 's/ \+/ /g' gesamt.txt -i #entfernt überflüssige Leerzeichen
  sed 's/$/<br>/' gesamt.txt -i
  head gesamt.txt -n 3 > mittag.txt
  tail gesamt.txt -n 1 > abend.txt
fi
