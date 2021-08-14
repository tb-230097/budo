<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-4</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str" placeholder="コメント">
        <input type="submit" name="submit">
       <?php
            if(!empty($_POST["str"])){
               $str = $_POST["str"];
             $filename="mission_2-4.txt";
                $fp = fopen($filename,"a");
                fwrite($fp, $str.PHP_EOL);
                fclose($fp);  
            }
            foreach($filename=file("mission_2-4.txt")as $text){
                echo $text . "<br>";
            }    
        ?>
    </form>
</body>
</html>
                       