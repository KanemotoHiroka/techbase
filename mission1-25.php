<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-24
        </title>
    </head>
    <body>
        <?PHP
        $str="W";
        $fname ="mission1-24.txt";
        $fp=fopen($fname,w);
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        echo "書き込み成功";
        ?>
        
    </body>
</html>