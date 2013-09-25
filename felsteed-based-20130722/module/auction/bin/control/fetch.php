<?php

echo"===== FETCH AUCTIONS =====\n";

$thisdir = dirname(__FILE__);

require_once($thisdir.'\..\model\AuctionCollection.php');

function stamp() {return date("Y-m-d H:i:s");}

$auctions = new AuctionCollection();

echo"- (".stamp().") Connecting to blades-edge auctions json...\n";

$auctions->fetchRaw();

echo"- (".stamp().") Downloaded data.\n";

echo"- (".stamp().") Making local file...\n";

$auctions->putRaw();

echo"- (".stamp().") Done.\n";

echo"===== END FETCH AUCTIONS =====\n";

?>
