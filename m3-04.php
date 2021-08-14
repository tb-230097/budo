<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-4</title>
</head>
<body>
    <?php
        $filename= "mission_3-4.txt";
        if(!empty($_POST["name"]) && !empty($_POST["comment"])){
            $name = $_POST["name"];
            $comment =$_POST["comment"];
            if(empty($_POST["editnum"])){
            $date = date("Y/m/d/ H:i;s:");
        if(file_exists($filename)){
            $num = count(file($filename))+1;
        }
        $fp = fopen($filename,"a");
            $newdate=$num."<>".$name."<>".$comment."<>".$date;
            fwrite($fp, $newdate.PHP_EOL);
            fclose($fp);
        }
        }
        
        if(!empty($_POST["name"])&& !empty($_POST["comment"])&& !empty($_POST["editnum"])){
            $editnum = $_POST["editnum"];     
            $date = date("Y/m/d/ H:i;s:"); 
            $lines = file($filename);
            $fp = fopen($filename,"w");
            foreach((array)$lines as $line){
            $contents =explode("<>", $line);
            if($contents [0]== $editnum){
            fwrite($fp,$editnum."<>".$name."<>".$comment."<>".$date.PHP_EOL);
            }else{
            fwrite($fp,$line);
            }
            }
            fclose($fp);
            }
            
            if(!empty($_POST["delete"])){
            $delete = $_POST["delete"];
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            file_put_contents($filename,"");
            foreach((array)$lines as $line){
            $contents =explode("<>", $line);
            if($delete != $contents[0] ){
                $postnum=$contents[0];
            if($postnum=$line){
                $fp = fopen($filename, "a");
                fwrite($fp, $line.PHP_EOL);
                fclose($fp);
         }
         }
         }
         }
        if(!empty($_POST["edit"])){
        $edit = $_POST["edit"];
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach((array)$lines as $line){
        $contents =explode("<>", $line);
        $postnum=$contents[0];
        if($postnum== $edit){
            
            $editnum =$contents[0];
            $editname=$contents[1];
            $editcomment=$contents[2];
        }
        }
        }
        ?>    
    <form action="" method="post">
        <h3>【投稿フォーム】</h3>
        <label>名前:</label><input type="text" name="name" 
               value = "<?php if(!empty($editname)){echo $editname;}?>"><br>
         <label>コメント:</label><input type="text" name="comment" 
               value = "<?php if(!empty($editcomment)){echo $editcomment;}?>"><br>
        <input type="hidden" name="editnum" 
               value = "<?php if(!empty($editnum)){echo $editnum;}?>"><br>
        <input type="submit"  value = "送信"><br>

        <h3>【削除フォーム】</h3>
        <form action="" method="post"> 
        <label>投稿番号:</label><input type="number" name="delete" ><br>
        <input type= "submit"  value="削除"><br><br>
   
        <h3>【編集フォーム】</h3>
        <form action="" method="post"> 
        <label>投稿番号:</label><input type="number" name="edit" ><br>
        <input type="submit" value="編集"><br>
    </form>
        
    <style>
          label{
                float: left;
                width: 100px;
                }
        </style>  
    </form>
     <?php
         $filename= file("mission_3-4.txt");
         foreach($filename as $text){
             echo $text."<br>";
         }
        ?>
</body>
</html>