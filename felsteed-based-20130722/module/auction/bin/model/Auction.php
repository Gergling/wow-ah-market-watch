<?php

class Auction {
	private $item = null;

	private $data;

	function load($data) {
		$this->data = $data;
		// The item will need to be fetched here.
		$this->item = &ItemCollection::fetch($data['item']);
	}
}

?>