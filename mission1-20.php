<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-20
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="comment" size="12">
            <input type="submit" name="提出" size="12">
        </form>
        <?php
            $str=$_POST["comment"];
            echo $str;
        ?>
    </body>
</html>