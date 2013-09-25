<?php

file_get_contents(dirname(__FILE__) ."/../data/blades-edge-auctions.json");

// Decode the json into the auctions
// Each auction best be an object
// Each item needs an object, an auction will be linked to one item
// Each stat needs an object, an item will be linked to several stats through stat quantities
// Auctions are cycled through, ordered by ascending numbers of different stats, each stat is taken

?>