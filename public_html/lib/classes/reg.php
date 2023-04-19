<?php

require_once('../classes/database.php');
require_once('../config.php');

class UserReg
{
	private $db;
	public function __construct()
	{
		$this->db = new MySQLDB("localhost", "root", "", "practicexam");
		$this->db->connect();
	}
	public function __destruct()
	{
		$this->db->close();
	}
	public function register($type, $full_name, $short_name, $passport, $password)
	{
		$type = $this->db->escape($type);
		$full_name = $this->db->escape($full_name);
		$short_name = $this->db->escape($short_name);
		$passport = $this->db->escape($passport);
		$password = $this->db->escape($password);

		$query = "INSERT INTO clients (type, full_name, short_name, passport, password) VALUES ('$type', '$full_name', '$short_name', '$passport', '$password')";

		if ($this->db->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}
?>