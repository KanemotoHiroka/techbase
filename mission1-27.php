<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-27
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="com" placeholder="入力してください">
            <input type="submit" value="提出">
        </form>
        <?PHP
        $str=$_POST["com"];
        $fname ="mission1-27.txt";
        $fp=fopen($fname,a);
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        echo "書き込み成功<br>";
        
        if(file_exists($fname)){
            $line = file($fname,FILE_IGNORE_NEW_LINES);
            foreach($line as $lines){
                if($lines%3==0&&$lines%5==0){
                    echo "FizzBuzz<br>";
                }
                elseif($lines%3==0){
                    echo "Fizz<br>";
                }
                elseif($lines%5==0){
                    echo "Buzz<br>";
                }
                else{
                    echo $lines."<br>";
                }
                
            }
        }
        ?>
        
    </body>
</html>