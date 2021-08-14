 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="comment" placeholder="コメント">
        <input type="submit" name="submit">
       <?php
            
            if(!empty($_POST["comment"])){
                $str = $_POST["comment"];
               echo $str ."を受け付けました";
                }elseif($str = ($_POST["完成"])){
                echo "おめでとう";
                
             $filename="mission_2-2.txt";
                $fp = fopen($filename,"a");
                fwrite($fp, $str.PHP_EOL);
                fclose($fp);  
            }
        ?>
    </form>
   
</body>
</html>
                       