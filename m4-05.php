
    <?php
     //DB接続
     $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $password = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    //データを入力（データレコードの挿入）
    $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = 'kuma';
    $comment = 'おはよう'; 
    $sql -> execute();
    ?> 