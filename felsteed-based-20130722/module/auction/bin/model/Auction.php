<?php

class Auction {
	public $item = null;

	private $data;

	function set($data) {
		$this->data = $data;
	}
	function fetchItem() {
		$this->item = &ItemCollection::fetch($this->data['item']);
		return $this->item;
	}
}

?>