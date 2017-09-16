#!/usr/bin/env bash
#Geburtstage von Server klauen und verarbeiten
#wget
#xlx -> xlsx -> csv
#letzter Punkt durch ; ersetzen
# VORNAME;NACHNAME;TT.MM;JJJJ
# Tägliche Abfrage
#if $(today) == $(TABELE_TT.MM)
#then $(toyear) - $(TABLE_JJJJ)
# Ausgabe geb.txt
today=`date +%e.%m `
year=`date +%Y`
Name=Geb_long
Folder="/home/heinz-wilhelm/pi-on-screen/html"
#Folder="/home/heinz-wilhelm/pi/vplan/html"
cd ${Folder}
wget http://h-ws.de/Geburtstage.xls
mv Geburtstage.xls $(Name).xlsx
libreoffice --convert-to xlsx $(Name).xls --headless #Umwandlung xls in xlsx
xlsx2csv -d; -s1 $(Name).xls >> $(Name).csv  # Beim Datum wird aus . ein /       is halt so
sed s?/?.?g -i $(Name).csv #Alle / durch . ersetzen
sed 's/.\([^.]*\)$/,\1/' -i $(Name).csv #letztes . durch , ersetzen -> Tag+Monat und Jahr getrennt

