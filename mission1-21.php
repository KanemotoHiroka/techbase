<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-21
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="comment"  placeholder="数字を入力してください">
            <input type="submit" name="提出" size="12">
        </form>
        <?php
            $i=$_POST["comment"];
            if($i == NULL){
                return FALSE;
            }
            if($i%3==0 && $i%5==0){
                echo "FizzBuzz<br>";
            }
            elseif($i%3==0){
                echo "Fizz<br>";
            }
            elseif($i%5==0){
                echo "Buzz<br>";
            }
            else{
                echo $i."<br>";
            }
        ?>
    </body>
</html>