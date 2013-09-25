<?php

class Item {
	function setData($data) {
		foreach($data as $key => $value) {
			$this->$key = $data;
		}
	}
}

?>