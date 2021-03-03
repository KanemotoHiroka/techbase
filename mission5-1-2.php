<?php
    $dsn = 'mysql:dbname=;host=localhost';
	$user = '';
	$password = '';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	//echo $password;
	
	$sql = "CREATE TABLE IF NOT EXISTS tbfive"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	. "time TEXT,"
	. "pass TEXT"
	.");";
	$stmt = $pdo->query($sql);
	?>