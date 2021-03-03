<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission3-4</title>
</head>

    <?php
        //変数の定義
        if(!empty($_POST["name"])&&!empty($_POST["comment"])){
            $name=$_POST["name"];
            $comment=$_POST["comment"];
        }

        

        $post_num=0;
        $time=date("Y/m/d H:i:s");
        $edit_number=0;
        if(!empty($_POST["delete_number"])){
            $delete_number=$_POST["delete_number"];
        }

        //txtへ保存
        $file_name="mission3-4.txt";
    ?>

    <?php
        //送信フォームに記載がある場合
        if(!empty($comment)&&!empty($name)){ //name,commentなしによるtxtの表記崩れ対策
            //flag is true or notで分岐して，edit or append
            
            if($_POST["flag_edit"]>0){
                //txt各行の要素を取得($columns)
                $columns=file($file_name,FILE_IGNORE_NEW_LINES);
                $post_num=count($columns);

                
                $num=1;
                $time=date("Y/m/d H:i:s");
                for($i=0;$i<$post_num;$i++){
                    $array=explode("<>",$columns[$i]);
                
                    //編集番号が一致かつ,パスワードと前回投稿時パスワードが一致している場合,columnsの内容置き換え
                    if($_POST["flag_edit"]==($i+1)){
                        $columns[$i]=$_POST["flag_edit"]."<>".$name."<>".$comment."<>".$time."<>";
                    }
                }

                //columnsをfileに適用,一旦空にする
                $path=fopen($file_name,"w");
                fwrite($path,"");
                fclose($path);

                $path=fopen($file_name,"a");
                foreach($columns as $column){
                    fwrite($path,$column.PHP_EOL);
                }
                fclose($path);

            }else{
                //txt新規作成or展開
                $path=fopen($file_name,"a");
                //txt内の各行の数をカウント
                $columns=file($file_name,FILE_IGNORE_NEW_LINES);
                $post_num=count($columns);
                fwrite($path,($post_num+1)."<>".$name."<>".$comment."<>".$time."<>".PHP_EOL);
                fclose($path);
            }
        }
    ?>
    <?php
        //削除フォームに記載がある場合
        if(!empty($delete_number)){
            //txt各行の要素を取得($columns)
            $columns=file($file_name,FILE_IGNORE_NEW_LINES);
            $post_num=count($columns);

            //一旦txtを空にする
            $path=fopen($file_name,"w");
            fwrite($path,"");
            fclose($path);

            $path=fopen($file_name,"a");
            //for文で条件に応じてtxtにappend
            $num=1;
            for($i=0;$i<$post_num;$i++){
                $array=explode("<>",$columns[$i]);


                if($i+1==$delete_number){
                    echo "投稿が削除されました";
                }else{
                    $words=explode("<>",$columns[$i]);
                    fwrite($path,$num."<>".$words[1]."<>".$words[2]."<>".$words[3]."<>".PHP_EOL);
                    $num++;
                }
            }
            fclose($path);
        }
    ?>

   <?php
        //編集フォームに記載がある場合
        if(!empty($_POST["edit_number"])){
            $edit_number=$_POST["edit_number"];
        }
        if(!empty($edit_number)){
            //txt各行の要素を取得($columns)
            $columns=file($file_name,FILE_IGNORE_NEW_LINES);
            $post_num=count($columns);
            //editする対象を抜き出す
            $edit_array_gen=$columns[$edit_number-1];
            $edit_array=explode("<>",$edit_array_gen);
            
            //if($edit_array[4]==$password){
                $edit_name=$edit_array[1];
                $edit_comment=$edit_array[2];
                //$edit_password=$edit_array[4];
            //}
            echo "編集が有効です<br>";
        }
    ?>

<body>
    <form method="POST" action="" id="info">      
        名前を入力:<input type="text" name="name" value=<?php if(!empty($edit_name)){echo $edit_name;}else{echo "name";}?>><br>
        コメントを入力:<input type="text" name="comment" value=<?php if(!empty($edit_comment)){echo $edit_comment;}else{echo "comment";}?>><br>
        
        <input type="hidden" name="flag_edit" value=<?php echo $edit_number?>><br>
        <input type="submit" name="submit" value="submit"><br>
    </form>
<hr>
    <form method="POST" action="" id="delete">   
        
        削除する投稿番号:<input type="number" name="delete_number" value="1"><br>
        <input type="submit" name="delete" value="削除する"><br>
    </form>
<hr>
    <form method="POST" action="" id="edit">   
        
        編集したい投稿番号:<input type="number" name="edit_number" value="1"><br>
        <input type="submit" name="edit" value="編集する"><br>
    </form>
<hr>

    
    
    <?php
        //出力部分
        //txtが存在しないのにfileで読み取りするとエラーが起きるため，条件分岐
        if(file_exists($file_name)){
            $lines=file($file_name,FILE_IGNORE_NEW_LINES);
            //各行に対してループ
            foreach($lines as $line){
                $words=explode("<>",$line);
                //分割した各言葉に対してループ
                echo "<strong>".$words[0]."</strong><br>";
                echo "<italic>".$words[1]."</italic><br>";
                echo "<span style='color:red;'>".$words[2]."</span><br>";
                echo $words[3]."<br>";
            }
        }
    ?>

</body>
</html>