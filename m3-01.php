<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-1</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前"><br>
        <input type="text" name="comment" placeholder="コメント"><br>
        <input type="submit" name="submit" value = "送信">
        
        <?php
        $filename= "mission_3-1.txt";
        if(!empty($_POST["name"]) && !empty($_POST["comment"])){
            
        $date = date("Y/m/d/ H:i;s:");
        $name = $_POST["name"];
        $comment =$_POST["comment"];
        if (file_exists($filename)) {
        $num = count(file($filename))+1;
        }
         $fp = fopen($filename,"a");
         $newdate=$num."<>".$name."<>".$comment."<>".$date;
        fwrite($fp, $newdate.PHP_EOL);
        fclose($fp);  
        }
        foreach($filename=file("mission_3-1.txt")as $text){
                echo $text . "<br>";
        }       
        ?>
    </form>
   
</body>
</html>