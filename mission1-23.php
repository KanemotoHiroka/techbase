<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission1-23
        </title>
    </head>
    <body>
        <?php
            $member=array("Ken","Alice","Judy","BOSS","Bob");
            foreach($member as $m){
                if($m==BOSS){
                    echo "Good morning ".$m."!<br>";
                }
                else{
                    echo "Hi!".$m."<br>";
                }
            }
        ?>
    </body>
</html>