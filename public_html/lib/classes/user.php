<?php

require_once('../classes/database.php');
require_once('../config.php');

class User
{
	private $db;

	function __construct()
	{
		$this->db = new MySQLDB("localhost", "root", "", "practicexam");
		$this->db->connect();
	}

	function getUserData($username)
	{
		$sql = "SELECT `type`, `full_name`, `short_name`, `passport` FROM clients WHERE passport = '$username'";
		$result = $this->db->query($sql);

		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		} else {
			return null;
		}
	}
}

?>