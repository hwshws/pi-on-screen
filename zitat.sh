#!/bin/bash
foo=$(sed $= -n html/zitat.txt) #Zeilen in Datei auslesen
num=$(($RANDOM % $foo + 1)) #Zufallszahl; Arbeitsbereich: 1- $foo
echo $num
echo "jetzt"
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt
sed -n "/$num/p" html/zitat.txt

echo "OK"
if [ $((num%2)) -eq 0 ] #Abfrage: $num gerade / ungerade?
then
    echo "even"
    num=$((num + 0))
  #  echo $num
    sed "/$num/q;d" html/zitat.txt

else
    echo "odd"
    num=$((num + 1))
  #  echo $num
    sed "/$num/q;d" html/zitat.txt
fi
#sed "/$num/q;d" html/zitat.txt
