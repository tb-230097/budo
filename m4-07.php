
    <?php
     $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $password = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //入力されているデータレコードの内容を編集
    //bindParamの引数（:nameなど）は4-2でどんな名前のカラムを設定したかで変える必要
    $id = 1; //変更する投稿番号
    $name = "panda";
    $comment = "おやすみ"; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute(); 
    //続けて、4-6の SELECTで表示させる機能 も記述し、表示もさせる。
    //※ データベース接続は上記で行っている状態なので、その部分は不要
    
    ?>