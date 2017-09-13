                                <i>
                                <?php
                                // Feed einlesen - Urspringblog
                                if( !$xml = simplexml_load_file('https://www.urspringblog.de/feed/') ) {
                                    die('Es passierte ein Fehler! Das tut uns leid');
                                }

                                // Ausgabe Array
                                $out = array();

                                // auszulesende Datensaetze
                                $i = 2;

                                // Items vorhanden?
                                if( !isset($xml->channel[0]->item) ) {
                                    die('Keine Items vorhanden!');
                                }

                                // Items holen
                                foreach($xml->channel[0]->item as $item) {
                                    if( $i-- == 0 ) {
                                        break;
                                    }

                                    $out[] = array(
                                        'title'        => (string) $item->title,
                                        'description'  => (string) $item->description,
                                        'link'         => (string) $item->guid,
                                        'date'         => date('d.m.Y H:i', strtotime((string) $item->pubDate))
                                    );
                                }

                                // Eintraege ausgeben
                                foreach ($out as $value) {
                                    echo $value['title']."<br>";
                                } ?>
  				                    </i>
  				                    <?php

                                // TAGESSCHAU -Feed einlesen
                                if( !$xml = simplexml_load_file('http://www.tagesschau.de/xml/rss2') ) {
                                    die('Fehler beim Einlesen der XML Datei!');
                                }

                                // Ausgabe Array
                                $out = array();

                                // auszulesende Datensaetze
                                $i = 3;

                                // Items vorhanden?
                                if( !isset($xml->channel[0]->item) ) {
                                    die('Keine Items vorhanden!');
                                }

                                // Items holen
                                foreach($xml->channel[0]->item as $item) {
                                    if( $i-- == 0 ) {
                                        break;
                                    }

                                    $out[] = array(
                                        'title'        => (string) $item->title,
                                        'description'  => (string) $item->description,
                                        'link'         => (string) $item->guid,
                                        'date'         => date('d.m.Y H:i', strtotime((string) $item->pubDate))
                                    );
                                }

                                // Eintraege ausgeben
                                foreach ($out as $value) {
                                    echo $value['title']."<br>";
                                }

                                ?>
