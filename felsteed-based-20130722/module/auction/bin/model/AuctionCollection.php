<?php

require_once("ItemCollection.php");
require_once("Auction.php");

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
	function getLocalRawAuctionsPath() {return dirname(__FILE__) ."/../../data/blades-edge-auctions.json";}
	function getLocalAuctionsPath() {return dirname(__FILE__) ."/../../data/blades-edge-auctions-processed.json";}
	function putRaw() {
		if ($this->rawData) {
			return file_put_contents($this->getLocalRawAuctionsPath(), $this->rawData);
		} else {
			throw new NoNewDataException();
		}
	}
	function put() {
		// JSONify object and put into file.
		return file_put_contents($this->getLocalAuctionsPath(), JSON_encode($this->auctions));
	}
	function fetchRaw() {
		// From server
		$this->rawData = curl_exec($this->curl); 
		curl_close($this->curl);
	}
	function loadAuctions() {
		$rawData = file_get_contents($this->getLocalRawAuctionsPath());
		$data = JSON_decode($rawData);
		foreach($data["alliance"]["auctions"] as $auctionData) {
			$auction = new Auction();
			$auction->set($auctionData);
			$this->auctions[$auction->id] = $auction;
		}
	}
	function fetchItems() {
		// Should throw an exception if there are no auctions loaded.
		if (count($this->auctions)) {
			foreach($this->auctions as $auction) {
				//ItemCollection::getInstance()->fetchItem($auction->item->id);
				$auction->fetchItem();
			}
		} else {
			throw new NoAuctionsLoaded();
		}
	}

	static $instance = null;
	public static function getInstance() {
		if (!self::$instance) {self::$instance = new self();}
		return self::$instance;
	}
}

class NoNewDataException extends Exception {}
class NoAuctionsLoaded extends Exception {}

?>