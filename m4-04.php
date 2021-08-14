    <?php
     //DB接続
     $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $password = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //作成したテーブルの構成詳細を確認する
    //SHOW CREATE TABLE 文を使うと、そのテーブルを作成するためのSQL（ CREATE文 ）が確認できる
    $sql ='SHOW CREATE TABLE tbtest';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[1];
    }
    echo "<hr>";
    ?> 