<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission2-1
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="com" value="コメント">
            <input type="submit" value="提出">
        </form>
        <?PHP
        $str=$_POST["com"];
        $fname ="mission2-1.txt";
        $fp=fopen($fname,a);
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        //echo "書き込み成功<br>";
        if($str==NULL){
            return FALSE;
        }
        
        if(file_exists($fname)){
            $line = file($fname,FILE_IGNORE_NEW_LINES);
            foreach($line as $lines){
                
                echo $lines."を受け付けました<br>";
            }
                
        }
        ?>
        
    </body>
</html>