<?PHP
    $dsn = 'mysql:dbname=;host=localhost';
	$user = '';
	$password = '';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	//echo $password;
	
	$sql = 'DROP TABLE tbtest';
	$stmt = $pdo->query($sql);
	?>