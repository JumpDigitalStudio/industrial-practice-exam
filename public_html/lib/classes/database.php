<?php
class MySQLDB
{
	private $server;
	private $username;
	private $password;
	private $database;
	private $conn;

	function __construct($server, $username, $password, $database)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}
	function connect()
	{
		$this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);

		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}
	function escape($value)
	{
		return mysqli_real_escape_string($this->conn, $value);
	}
	function query($sql)
	{
		$result = mysqli_query($this->conn, $sql);

		if (!$result) {
			die("Query failed: " . mysqli_error($this->conn));
		}

		return $result;
	}
	function close()
	{
		mysqli_close($this->conn);
	}
}
?>