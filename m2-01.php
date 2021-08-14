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
               
            }
        ?>
        
    </form>
   
</body>
</html>
            