<?php

require_once("ItemCollection.php");

class AuctionCollection {
	private $rawData;
	private $curl;
	private $auctions = array();
	
	function __construct() {
		$tuCurl = curl_init(); 
		curl_setopt($tuCurl, CURLOPT_URL, "http://us.battle.net/auction-data/blades-edge/auctions.json");
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, true);
		$this->curl = $tuCurl;
	}
	function putRaw() {
		if ($this->rawData) {
			return file_put_contents(dirname(__FILE__) ."/../../data/blades-edge-auctions.json", $this->rawData);
		} else {
			throw new NoNewDataException();
		}
	}
	function fetchRaw() {
		// From server
		$this->rawData = curl_exec($this->curl); 
		curl_close($this->curl);
	}
	function loadRaw() {
		$this->rawData = file_get_contents(dirname(__FILE__) ."/../../data/blades-edge-auctions.json");
	}
	function doSomething() {
		$data = JSON_decode($this->rawData);
		foreach($data["alliance"]["auctions"] as $auction) {
			
		}
	}

	static $instance = null;
	public static function getInstance() {
		if (!self::$instance) {self::$instance = new self();}
		return self::$instance;
	}
}

class NoNewDataException extends Exception {}

?>