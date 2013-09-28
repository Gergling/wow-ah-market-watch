<?php

echo"===== FETCH ITEM DATA =====\n";

$thisdir = dirname(__FILE__);

require_once($thisdir.'\..\model\AuctionCollection.php');

function stamp() {return date("Y-m-d H:i:s");}

$auctions = new AuctionCollection();

echo"- (".stamp().") Loading local auctions data...\n";

$auctions->loadRaw();

echo"- (".stamp().") Loaded data.\n";

$auctions->fetchItems();

echo"- (".stamp().") Making local file...\n";

$auctions->put();

echo"- (".stamp().") Done.\n";

echo"===== END FETCH ITEM DATA =====\n";

?>
