<?php

/**
* A dice class to play around with a dice lol
*/
class CDice {
	private $lastRoll = array();

	public function __construct() {

	}

	public function Roll($times) {
		$this->lastRoll = array();
		for ($i=0; $i < $times; $i++) { 
			$this->lastRoll[] = rand(1,6);
		}
	}


	public function GetResults() {
		return $this->lastRoll;
	}

	public function GetTotal() {
		return array_sum($this->lastRoll);
	}
}