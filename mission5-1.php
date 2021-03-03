<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission5-1</title>
</head>

	<?php
	if(!empty($_POST["name"])&&!empty($_POST["com"])){
	    $name =$_POST["name"];
	    $comment = $_POST["com"];
	}
	if(!empty($_POST["pass"])){
	    $pass=$_POST["pass"];
	}
	
	$post_num=0;
    $time=date("Y/m/d H:i:s");
    $e_number=0;
    if(!empty($_POST["d_number"])){
        $delete_number=$_POST["d_number"];
    }
    
    if(!empty($_POST["e_number"])){
        $e_number=$_POST["e_number"];
    }
	?>
	
	
	<?php
	    if(!empty($comment)&&!empty($name)){
	        if($_POST["flag_edit"]>0){
	            //$flag_edit=$e_number;
	            $dsn = 'mysql:dbname=;host=localhost';
	            $user = '';
	            $password = '';
	            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	       
	            $flag_edit = $_POST["flag_edit"];
	            $sql = 'SELECT * FROM tbfive WHERE id=:id';
                $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
                $stmt->bindParam(':id', $flag_edit, PDO::PARAM_INT);
	            $stmt->execute();
	            $results = $stmt->fetchAll();
        	    foreach($results as $row){
	            if($row['pass']==$_POST["pass"]){
	            
	            
	            $id = $_POST["flag_edit"]; //変更する投稿番号
	            $name = $_POST["name"];
	            $comment = $_POST["com"]; //変更したい名前、変更したいコメントは自分で決めること
	            $sql = 'UPDATE tbfive SET name=:name,comment=:comment WHERE id=:id';
	            $stmt = $pdo->prepare($sql);
	            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	            $stmt->execute();
	            }
        	   }
	        }
	        else{
	            $dsn = 'mysql:dbname=;host=localhost';
	            $user = '';
	            $password = '';
	            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	        //echo $password;
	        
	            $sql = $pdo -> prepare("INSERT INTO tbfive (name, comment, time, pass) VALUES (:name, :comment, :time, :pass)");
	            $sql -> bindParam(':name', $name_second, PDO::PARAM_STR);
	            $sql -> bindParam(':comment', $comment_second, PDO::PARAM_STR);
	            $sql -> bindParam(':time', $time_second, PDO::PARAM_STR);
	            $sql -> bindParam(':pass', $pass_second, PDO::PARAM_STR);
	            $name_second = "$name";
	            $comment_second ="$comment"; 
	            $time_second = "$time";
	            $pass_second = "$pass";//好きな名前、好きな言葉は自分で決めること
	            $sql -> execute();
	        }
	        
	        
	   }
	?>	
	<?php
        //削除フォームに記載がある場合
    if(!empty($delete_number)){
            //if($delete_number==$pass){
        $dsn = 'mysql:dbname=;host=localhost';
	    $user = '';
	    $password = '';
	    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	
        $sql = 'SELECT * FROM tbfive WHERE id=:id';
        $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
        $stmt->bindParam(':id', $delete_number, PDO::PARAM_INT);
	    $stmt->execute();
	    $results = $stmt->fetchAll();
	    foreach($results as $row){
	       if($row['pass']==$_POST["pass"]){
	           
	           $id = $delete_number;
	           $sql = 'delete from tbfive where id=:id';
	           $stmt = $pdo->prepare($sql);
	           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	           $stmt->execute();
	       }
	   }
	        
            
	        
            //}
        }
    ?>

<body>
    <form method="POST" action="" id="info">      
        名前を入力:<input type="text" name="name" value=<?php if(!empty($name)){echo $name;}else{echo "name";}?>><br>
        コメントを入力:<input type="text" name="com" value=<?php if(!empty($comment)){echo $comment;}else{echo "comment";}?>><br>
        パスワードを入力：<input type="text" name="pass" value=<?php if(!empty($pass)){echo $pass;}else{echo"password";}?>><br>
        
        <input type="hidden" name="flag_edit" value=<?php echo $e_number?>><br>
        <input type="submit" name="submit" value="submit"><br>
    </form>
<hr>
    <form method="POST" action="" id="delete">   
        
        削除する投稿番号:<input type="number" name="d_number" value="1"><br>
        パスワードを入力：<input type="text" name="pass" ><br>
        <input type="submit" name="delete" value="削除する"><br>
    </form>
<hr>
    <form method="POST" action="" id="edit">   
        
        編集したい投稿番号:<input type="number" name="e_number" value="1"><br>
        パスワードを入力：<input type="text" name="pass" ><br>
        <input type="submit" name="edit" value="編集する"><br>
    </form>
<hr>


	

	
	
<?php
    $dsn = 'mysql:dbname=;host=localhost';
	$user = '';
	$password = '';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	$sql = 'SELECT * FROM tbfive';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].',';
		echo $row['time'].'<br>';
	 echo "<hr>";
	} 
?>
    
    
    

</body>
</html>