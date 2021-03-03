<?PHP
    $dsn = 'mysql:dbname=;host=localhost';
	$user = '';
	$password = '';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	//echo $password;
	$sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = '名前';
	$comment = 'first_date'; //好きな名前、好きな言葉は自分で決めること
	$sql -> execute();

	?>