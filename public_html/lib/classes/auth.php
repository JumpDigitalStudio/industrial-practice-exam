<?php

require_once('../classes/database.php');
require_once('../config.php');

class UserAuth
{
	private $db;

	public function __construct()
	{
		$this->db = new MySQLDB("localhost", "root", "", "practicexam");
		$this->db->connect();
	}

	public function auth($username, $password)
	{
		$username = $this->db->escape($username);
		$password = $this->db->escape($password);
		$password = md5($password);

		$sql = "SELECT * FROM clients WHERE passport = '$username' AND password = '$password'";
		$result = $this->db->query($sql);

		if (mysqli_num_rows($result) > 0) {
			$user = mysqli_fetch_assoc($result);
			return $user;
		} else {
			return false;
		}
	}

	function authenticate($username, $password)
	{
		$sql = "SELECT password FROM clients WHERE passport='$username'";
		$result = $this->db->query($sql);

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$password_hashed = $row['password'];
			if (password_verify($password, $password_hashed)) {
				return true;
			}
		}

		return false;
	}

	public function logout()
	{
		session_start();
		session_destroy();
	}
}