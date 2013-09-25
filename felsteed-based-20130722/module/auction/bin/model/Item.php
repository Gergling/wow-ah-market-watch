<?php

class Item {
	public $id = null;
	function set($data) {
		foreach($data as $key => $value) {
			$this->$key = $data;
		}
	}
}

?>