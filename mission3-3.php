<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>
            mission3-3
        </title>
    </head>
    <body>
        <form action="" method="POST">
            名前：<input type="text" name="name" size="5"  value="名前">
            <input type="text" name="com" value="コメント">
            <input type="submit" value="提出"><br>
        </form>
        <form action="" method="POST">
            削除：<input type="text" name="d_number" size="5" placeholder="例:1">
            <input type="submit" name="delete" value="削除">
        </form>
        <?PHP
            //提出用
            $name=$_POST["name"];
            $com= $_POST["com"];
            $time= date("Y年m月d日　H時間i分s秒");
            
            //削除用
            $d_number=$_POST["d_number"];
            
            
            
            //データ反映
            $fname="mission3-3.txt";
            $fp=fopen($fname,a);
            
            
            if(empty($name or $com)){
                echo "";
            }
            else{
                $number = count(file($fname))+1;
                fwrite($fp,$number."<>".$name."<>".$com."<>".$time.PHP_EOL);
                fclose($fp);
            }
            
            if(empty($d_number)){
                echo "";
            }
            
            if(file_exists($fname)){
                    $line_=file($fname,FILE_IGNORE_NEW_LINES);
                    foreach($line_ as $l){
                        $value_ = explode("<>",$l);
                        
                        if($value_[0] != $d_number){
                            for($s=0;$s<=3;$s++){
                                echo $value_[$s]."<br>";
                            }     
                        }
                    }
                }
            
            //if(file_exists($fname)){
                //$line=file($fname,FILE_IGNORE_NEW_LINES);
                //foreach($line as $n){
                        //$value = explode("<>",$n);
                        //for($i=0;$i<=3;$i++){
                                //echo $value[$i]."<br>";
                            //}
                            
                        //}
                        
                //}
                
            //}
        ?>
        
    </body>
</html>