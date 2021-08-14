<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-3</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前"><br>
        <input type="text" name="comment" placeholder="コメント"><br>
        <input type="submit" name="submit" value = "送信"><br><br>
        <input type="text" name="delete" placeholder="削除対象番号"><br>
        <input type="submit" name="del" value="削除">
        
        <?php
        $filename= "mission_3-3.txt";
        if(!empty($_POST["name"]) && !empty($_POST["comment"])){
            $date = date("Y/m/d/ H:i;s:");
            $name = $_POST["name"];
            $comment =$_POST["comment"];
        if (file_exists($filename)){
            $num = count(file($filename))+1;
        }
             $fp = fopen($filename,"a");
             $newdate=$num."<>".$name."<>".$comment."<>".$date;
            fwrite($fp, $newdate.PHP_EOL);
            fclose($fp); 
        }
        
         if(!empty($_POST["delete"])){
         $delete = $_POST["delete"];
         $lines = file($filename,FILE_IGNORE_NEW_LINES);
         file_put_contents($filename,"");
         foreach((array)$lines as $line){
        $contents =explode("<>", $line);
        if($delete != $contents[0] ){
            $fp = fopen($filename, "a");
            fwrite($fp, $line.PHP_EOL);
            fclose($fp);
         }
         }
         }
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach((array)$lines as $line){
        $contents =explode("<>", $line);
        foreach($contents as $a){
                    echo $a."";
                 }               
             echo "<br>";
        }
        ?>
    </form>
</body>
</html>