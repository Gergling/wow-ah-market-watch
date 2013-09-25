<?php

/*

{
"realm":{"name":"Blade's Edge","slug":"blades-edge"},
"alliance":{"auctions":[
	{"auc":1159881933,"item":53010,"owner":"Deverlis","bid":305000,"buyout":2600000,"quantity":20,"timeLeft":"MEDIUM"},
	{"auc":1160115318,"item":32381,"owner":"Pitbullt","bid":456000,"buyout":500000,"quantity":1,"timeLeft":"VERY_LONG"},
	{"auc":1160394184,"item":52247,"owner":"???","bid":176225,"buyout":185500,"quantity":1,"timeLeft":"LONG"},
	{"auc":1160356298,"item":52297,"owner":"Althdanais","bid":2134900,"buyout":2134900,"quantity":1,"timeLeft":"LONG"},
	{"auc":1160253093,"item":56516,"owner":"Lascal","bid":380000,"buyout":385000,"quantity":1,"timeLeft":"VERY_LONG"},
	{"auc":1160002280,"item":22446,"owner":"Blackwidowe","bid":47310,"buyout":49800,"quantity":1,"timeLeft":"VERY_LONG"},


*/

class ItemCollection {
	private $items = array();
	private $index = array();

	function fetch($id) {
		if (!isset($this->items[$id])) {
			$tuCurl = curl_init(); 
			curl_setopt($tuCurl, CURLOPT_URL, "http://us.battle.net/api/wow/item/{$id}");
			curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, true);
			$itemData = curl_exec($this->curl); 
			curl_close($this->curl);
			
			// Need an item factory - either outputs a weapon or armour. Maybe something else?
			$item = new Item();
			if (isset($itemdata["weaponInfo"])) {
				$item = new Weapon();
			}
			if ($itemdata["baseArmor"]>0) {
				$item = new Armour();
			}

			if ($item) {
				$item->setData($itemData);
				$this->addItem($item);
			}
		}
		return $this->items[$id];
	}
	function put() {
		// Turns items variable into json and stores somewhere.
	}
	function load() {
		// Retrieves local file of items.
	}

	function addItem($item) {
		$this->items[$item->id] = &$item;
		switch(class_name($item)) {
			case "Armour": {
				$this->index["armour"][$item->id] = &$item;
			} break;
			case "Weapon": {
				$this->index["weapon"][$item->id] = &$item;
			} break;
			default: {
			}
		}
	}

	static $instance = null;
	public static function getInstance() {
		if (!self::$instance) {self::$instance = new self();}
		return self::$instance;
	}
}

?>