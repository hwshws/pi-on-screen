<!-- Begin

// Array Wochentag
Wochentag = new Array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag");


// Funktionen für Anzeigen Tag Datum + dynamische Uhrzeit

function DisplayTime()
{
 var SystemDatum = new Date();
 var CounterTag = SystemDatum.getDate();
 var CounterMonat = SystemDatum.getMonth() + 1;
 var CounterJahr = SystemDatum.getFullYear();
 var CounterStd = SystemDatum.getHours();
 var CounterMin = SystemDatum.getMinutes();
 var CounterSek = SystemDatum.getSeconds();
 var TagDerWoche = SystemDatum.getDay();

 //  für zweistellige Anzeige
 var CounterTag2  = ((CounterTag < 10) ? "0" : "");
 var CounterMonat2  = ((CounterMonat < 10) ? ".0" : ".");
 var CounterStd2  = ((CounterStd < 10) ? "0" : "");
 var CounterMin2  = ((CounterMin < 10) ? ":0" : ":");
var CounterSek2  = ((CounterSek < 10) ? "" : "");


 // Die 3 Fragmente für die Anzeige Wochentag Datum Zeit

 // aktuelles Datum
 var DatumJetzt = CounterTag2 + CounterTag + CounterMonat2 + CounterMonat  + "." + CounterJahr + "<br>";

 // aktuelle Zeit
 var ZeitJetzt = CounterStd2 + CounterStd + CounterMin2 + CounterMin + CounterSek2 + " Uhr";

// Option hier eintragen 1,2,3 oder 4
DarstellungOption = 4

switch (DarstellungOption) {
  case 1:
    // Anzeige der Zeit
    var DispString = ZeitJetzt;
    break;
  case 2:
    // Anzeige Datum + Zeit
    var DispString = DatumJetzt + " &nbsp;" + ZeitJetzt;
    break;
  case 3:
    // Anzeige Wochentag + Zeit
    var DispString = Wochentag[TagDerWoche] + " &nbsp;" + ZeitJetzt;
    break;
  case 4:
    // Anzeige Wochentag + Datum + Zeit
    var DispString = Wochentag[TagDerWoche] + ", " + DatumJetzt + "<br>" + ZeitJetzt;
    break;
    }

document.getElementById("ZeitAnzeige").innerHTML = DispString;

setTimeout("DisplayTime()", 1000);
}

window.setTimeout('DisplayTime()',1000);
// -->
