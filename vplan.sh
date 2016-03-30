#!/bin/bash
#12/03/16 by hwshws
#Klaut sich den V-Plan vom U-Server und verararbeitet das HTML an USB
cd ~/vplan/docx2txt
rm Vertretungsplan.txt
rm Vertretungsplan.docx
wget http://comenius.urspringschule.de/urspring/Vertretungsplan.docx
./docx2txt.sh Vertretungsplan.docx
sed -i '/^\s*$/d' Vertretungsplan.txt
sed -i 's/$/<br>/' Vertretungsplan.txt
sed -i 1d Vertretungsplan.txt
cp Vertretungsplan.txt ~/vplan/html/vplan.txt

