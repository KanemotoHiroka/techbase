<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-11
        </title>
    </head>
    <body>
        <?php
        $num =15;
        if($num%15==0){
            echo "FizzBuzz";
        }
        elseif($num%5==0){
            echo "Buzz";
        }
        elseif($num%3==0){
            echo "Fizz";
        }
        else{
            echo $num;
        }
        ?>
    </body>
</html>