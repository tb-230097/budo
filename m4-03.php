 <?php
    //DB接続
    $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $password = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //データベースのテーブル一覧を表示
    $sql ='SHOW TABLES';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[0];
        echo '<br>';
    }
    echo "<hr>";
  ?>
    
    
