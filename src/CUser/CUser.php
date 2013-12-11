<?php
/**
 * User Class
 */
class CUser {
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	/**
	 * Login function
	 * @param [string] $username [The username]
	 * @param [string] $password [The password]
	 */
	function Login($username, $password) {
		$sql = "SELECT acronym, name FROM kmom04_user WHERE acronym = ? AND password = md5(concat(?, salt))";
		$res = $this->db->Select($sql, array($username, $password));
		if(isset($res[0])) {
			$_SESSION['user'] = $res[0];
		} else { 
			return false;
		}
	}
	/**
	 * Simply unsets the session
	 */
	function Logout() {
		unset($_SESSION['user']);
		header("Location: logout.php");
		exit;
	}
	
	
	/**
	 * Returns true if person is logged in
	 */
	function IsAuthenticated() {
		return isset($_SESSION['user']);
	}

	function GetName() {
		return $_SESSION['user']->name;
	}

	function GetAcronym() {
		return $_SESSION['user']->acronym;
	}


	/**
	 * Macig toString method
	 * @return string [description]
	 */
	function __toString() {
		return 'Name: ' . $_SESSION['user']->name . ' Acronym: ' . $_SESSION['user']->acronym;		
	}
	
	/**
	 * Magic isset method.. just to learn, no need to use it
	 * @param  [type]  $var [description]
	 * @return boolean      [description]
	 */
	function __isset($var) {
		return isset($_SESSION[$var]);
	}
	/**
	 * Magic get method 
	 * @param  [type] $property [description]
	 * @return [type]           [description]
	 */
	function __get($property) {
		if(property_exists($this, $property)) {
			return $this->$property;
		} else {
			die($property . ' does not exist..');
		}
	}
}