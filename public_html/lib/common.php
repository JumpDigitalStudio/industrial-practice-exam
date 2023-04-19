<?php

require_once('../lib/classes/database.php');
$db = new MySQLDB('localhost', 'root', '', 'practicexam');
$db->connect();

$db->close();
?>