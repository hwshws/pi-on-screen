#!/usr/bin/env bash
#Geburtstage von Server klauen und verarbeiten
#wget
#xlx -> xlsx -> csv
#letzter Punkt durch ; ersetzen
# VORNAME,NACHNAME,TT.MM,JJJJ
# Tägliche Abfrage
#if $(today) == $(TABELE_TT.MM)
#then $(toyear) - $(TABLE_JJJJ)
# Ausgabe geb.txt
today=`date +%e.%m `
year=`date +%Y`
Name=Geb_long
echo ${Name}
Folder="/opt/usb"
#Folder="/home/heinz-wilhelm/pi/vplan/html"
cd ${Folder}
wget http://h-ws.de/Geburtstage.xls
mv Geburtstage.xls ${Name}.xls
libreoffice --convert-to xlsx ${Name}.xls --headless #Umwandlung xls in xlsx
xlsx2csv -s1 ${Name}.xlsx >> ${Name}.csv  # Beim Datum wird aus . ein /       is halt so
sed s?/?.?g -i ${Name}.csv #Alle / durch . ersetzen
sed 's/.\([^.]*\)$/,\1/' -i ${Name}.csv #letztes . durch , ersetzen -> Tag+Monat und Jahr getrennt
