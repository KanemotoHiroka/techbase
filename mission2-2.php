<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission2-2
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="com" value="コメント">
            <input type="submit" value="提出">
        </form>
        <?PHP
        $str=$_POST["com"];
        $fname ="mission2-2.txt";
        $fp=fopen($fname,w);
        
        //echo "書き込み成功<br>";
        if(empty($str)){
            echo " ";
        }
        else{
            fwrite($fp,$str.PHP_EOL);
            fclose($fp);
        }
        
        if(file_exists($fname)){
            $line = file($fname,FILE_IGNORE_NEW_LINES);
            foreach($line as $lines){
                if($lines=="完成"){
                    echo $lines."mission2-2<br>";
                }
                elseif($lines=="おめでとう！"){
                    echo $lines."おめでとう！<br>";
                }
                else{
                    echo $lines."を受け付けました<br>";
                }
            }
                
        }
        ?>
        
    </body>
</html>