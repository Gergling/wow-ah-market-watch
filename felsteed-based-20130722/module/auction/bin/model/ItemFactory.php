<?php

class Itemfactory {
	function makeItem($itemData) {
		$item = new Item();
		if (isset($itemdata["weaponInfo"])) {
			$item = new Weapon();
		}
		if ($itemdata["baseArmor"]>0) {
			$item = new Armour();
		}

		//$item->id = 
	}

	static $instance = null;
	public static function getInstance() {
		if (!self::$instance) {self::$instance = new self();}
		return self::$instance;
	}
}