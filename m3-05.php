<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-5</title>
</head>
<body>
    <form action="" method="post">
        <p>【投稿フォーム】</p>
        <label>名前:</label><input type="text" name="name" 
               value = "<?php if(!empty($editname)){echo $editname;}?>"><br>
         <label>コメント:</label><input type="text" name="comment" 
               value = "<?php if(!empty($editcomment)){echo $editcomment;}?>"><br>
        <input type="hidden" name="editnum" 
               value = "<?php if(!empty($editnum)){echo $editnum;}?>">
        <label>パスワード:</label><input type="passward" 
               name="pass" value=""><br>
        
        <input type="submit"  value = "送信">
         
        <form action="" method="post"> 
        <p>【削除フォーム】</p>
        <label>投稿番号:</label><input type="number" name="delete" ><br>
        <label>パスワード:</label><input type="passward" 
                name="delpass" value=""><br>
        <input type= "submit"  value="削除">
   
        <form action="" method="post"> 
        <P>【編集フォーム】</P>
        <label>投稿番号:</label><input type="number" name="edit" ><br>
        <label>パスワード:</label><input type="passward" 
                name="edpass"  value=""><br>
        <input type="submit" value="編集">
    </form>
        
    <style>
          label{
                float: left;
                width: 100px;
                }
        </style>  
    </form>
    <?php
        $filename= "mission_3-5.txt";

        if(!empty($_POST["name"]) && !empty($_POST["comment"])&& !empty($_POST["pass"])){
           
            $password = $_POST["pass"];
            $name = $_POST["name"];
            $comment =$_POST["comment"];
            if(empty($_POST["editnum"])){
                if(!empty($_POST["date"])){
            $date = date("Y/m/d/ H:i;s:");
            if(file_exists($filename)){
            $num = count(file($filename))+1;
        }
            $fp = fopen($filename,"a");
            $nopass=$num."<>".$name."<>".$comment."<>".$date;
            $contents=explode("<>", $nopass);
            fwrite($fp, $nopass.PHP_EOL);
            fclose($fp,);
        }
        }
        }
        
        if(!empty($_POST["name"])&& $_POST["comment"]&& $_POST["editnum"]){
            $editnum = $_POST["editnum"];     
            $date = date("Y/m/d/ H:i;s:");
            $password = $_POST["pass"];
            $lines = file($filename);
            $fp = fopen($filename,"a");
            foreach((array)$lines as $line){
              $contents =explode("<>", $line);
            if($contents [0]== $editnum){
            fwrite($fp,$editnum."<>".$name."<>".$comment."<>".$date."<>".PHP_EOL);
            }else{
            fwrite($fp,$line);
            }
            }
            fclose($fp);
            }
            
            if(!empty($_POST["delete"]) && !empty($_POST["delpass"])){
            $delpass = $_POST["delpass"];   
            $delete = $_POST["delete"];
            $password = $_POST["pass"]; 
           
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            file_put_contents($filename,"");
            foreach((array)$lines as $line){
                $contents =explode("<>", $line);
                $postnum=$contents[0];
              if( $postnum == $delete && $contents[4]== $_POST["delpass"]){
                
              }else{
                  $fp = fopen($filename, "w");
                  fwrite($fp, $line.PHP_EOL);
              }
                  fclose($fp);
            }  
            }
            
        if(!empty($_POST["edit"])&& !empty($_POST["edpass"])){
         $edit =$_POST["edit"];    
        $edpass=$_POST["edpass"];
        $password = $_POST["pass"]; 
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach((array)$lines as $line){
          $contents =explode("<>", $line);
           var_dump($contents);
          $postnum=$contents[0];
        if($postnum == $edit &&  $contents[5] == $_POST["edpass"]){
            $editnum =$contents[1];
            $editname=$contents[2];
            $editcomment=$contents[3];
            $date=$contents[4];
            $password=$contents[5];
        }
        }
        }
        $filename= file("mission_3-5.txt");
          foreach($filename as $text){
               if(!empty($_POST["pass"])&& !empty($_POST["name"])
                  &&!empty($_POST["comment"])&&!empty($_POST["num"]) &&!empty($_POST["date"])){

             $newdate=$num."<>".$name."<>".$comment."<>".$date."<>".$password;;
             $contents =explode("<>",$newdate);
             echo $text. "<br>";
               }
          }
          
          
        ?>    
</body>
</html>