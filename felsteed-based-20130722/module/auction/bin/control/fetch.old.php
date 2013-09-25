<?php

function stamp() {return date("Y-m-d H:i:s");}

$tuCurl = curl_init(); 
curl_setopt($tuCurl, CURLOPT_URL, "http://us.battle.net/auction-data/blades-edge/auctions.json");
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, true);

echo"- (".stamp().") Connecting to blades-edge auctions json...\n";

$tuData = curl_exec($tuCurl); 
curl_close($tuCurl); 

echo"- (".stamp().") Downloaded data.\n";

echo"- (".stamp().") Making local file...\n";

//file_put_contents(__DIR__ ."/../data/blades-edge-auctions.json", $tuData);
file_put_contents(dirname(__FILE__) ."/../data/blades-edge-auctions.json", $tuData);

echo"- (".stamp().") Done.\n";

?>
