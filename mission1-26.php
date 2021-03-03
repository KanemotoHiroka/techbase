<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-26
        </title>
    </head>
    <body>
        <?PHP
        $str="W";
        $fname ="mission1-24.txt";
        $fp=fopen($fname,a);
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        echo "書き込み成功<br>";
        
        if(file_exists($fname)){
            $line = file($fname,FILE_IGNORE_NEW_LINES);
            foreach($line as $lines){
                echo $lines."<br>";
            }
        }
        ?>
        
    </body>
</html>