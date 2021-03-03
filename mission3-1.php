<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission3-1
        </title>
    </head>
    <body>
        <form action="" method="POST">
            名前：<input type="text" name="name" size="5"  value="名前">
            <input type="text" name="com" value="コメント">
            <input type="submit" value="提出">
        </form>
        <?PHP
            $name=$_POST["name"];
            $com= $_POST["com"];
            $time= date("Y年m月d日　H時間i分s秒");
            
            $fname="mission3-1.txt";
            $fp=fopen($fname,a);
            
            if(empty($name or $com)){
                echo "";
            }
            else{
                $number = count(file($fname))+1;
                fwrite($fp,$number."<>".$name."<>".$com."<>".$time.PHP_EOL);
                fclose($fp);
            }
            
            if(file_exists($fname)){
                $line=file($fname,FILE_IGNORE_NEW_LINES);
                foreach($line as $n){
                        echo $n."<br>";
                }
                
            }
        ?>
        
    </body>
</html>