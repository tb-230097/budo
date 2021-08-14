
    <?php
     $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $password = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //DROP文：作成されたテーブル自体を削除する
    // 【！この SQLは tbtest テーブルを削除します！】
    $sql = 'DROP TABLE tbtest';
    $stmt = $pdo->query($sql);
    
    ?> 