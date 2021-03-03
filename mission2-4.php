<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission2-4
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="com" value="コメント">
            <input type="submit" value="提出">
        </form>
        <?PHP
        $str=$_POST["com"];
        $fname ="mission2-4.txt";
        $fp=fopen($fname,a);
        $array=array();
        
        //echo "書き込み成功<br>";
        if(empty($str)){
            echo " ";
        }
        else{
            fwrite($fp,$str.PHP_EOL);
            fclose($fp);
        }
        
        if(file_exists($fname)){
            $line = file($fname,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
                foreach($line as $lines){
                if($lines=="完成"){
                    echo $lines."mission2-4<br>";
                }
                elseif($lines=="おめでとう！"){
                    echo $lines."おめでとう！<br>";
                }
                else{
                    echo $lines."<br>";
                }
            }
            
        }
        ?>
        
    </body>
</html>