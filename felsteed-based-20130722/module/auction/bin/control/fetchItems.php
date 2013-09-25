<?php

echo"===== FETCH ITEM DATA =====\n";

$thisdir = dirname(__FILE__);

require_once($thisdir.'\..\model\AuctionCollection.php');

function stamp() {return date("Y-m-d H:i:s");}

$auctions = new AuctionCollection();

echo"- (".stamp().") Loading local auctions data...\n";

$auctions->loadRaw();

echo"- (".stamp().") Downloaded data.\n";

echo"- (".stamp().") Making local file...\n";

$auctions->putRaw();

echo"- (".stamp().") Done.\n";

echo"===== END FETCH ITEM DATA =====\n";

?>
