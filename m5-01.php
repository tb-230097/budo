<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mission_5-1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
          crossorigin="anonymous"> 
</head>
<body>
    
    <?php
        //DB接続
    $dsn = 'mysql:dbname=tb230097db;host=localhost';
    $user = 'tb-230097';
    $db_pass = '2Wg86eek8s';
    $pdo = new PDO($dsn, $user, $db_pass, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
      //テーブル作成
     $sql = "CREATE TABLE IF NOT EXISTS mission5"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name char(32),"
    . "comment TEXT,"
    . "date TEXT,"
    . "password TEXT"
    .");";
    $stmt = $pdo->query($sql);
    
    $name = "";
    $comment="";
    $password = "";

    $id_update = "";
    $pass_up = "";
    $pass_update = "";

    $error_msg = "";
       
         // 投稿機能
         if (isset($_POST["submit_1"])) {
          if (!empty($_POST["name"]) && !empty($_POST["comment"]) 
             && !empty($_POST["password"]))
             {
       
             // Form is filled out fully and correctly
                $name = $_POST["name"];
                $comment = $_POST["comment"];
                $password = $_POST["password"];
                $date = date("Y/m/d H:i:s");
             
         // handling updates
         if (!empty($_POST["id_update"]) && !empty($_POST["pass_update"])){ {
              $id_for_update = $_POST["id_update"];
              $pass_for_update = $_POST["pass_update"];

              $sql = 'UPDATE mission5 SET name=:name, comment=:comment, date=:date WHERE id=:id';
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':id', $id_for_update, PDO::PARAM_INT);
              $stmt->bindParam(':name', $name, PDO::PARAM_STR);
              $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
              $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    
              $stmt->execute();
         }
             
              // handling uploading a new comment
              $sql = $pdo->prepare("INSERT INTO mission5 (name, comment, password, date) VALUES 
        　　　                    　　(:name, :comment, :password, :date)");
              $sql->bindParam(':name', $name, PDO::PARAM_STR);
              $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
              $sql->bindParam(':password', $password, PDO::PARAM_STR);
              $sql->bindParam(':date', $date, PDO::PARAM_STR);
    
              $sql->execute();
            }
            
          } else {
            // Error msg for when form is not filled out
            $error_msg = "<span class='error'>Error: please fill in the fields</span><br>";
          }
        }
    
    
     // 削除機能
      if (isset($_POST["submit_2"])) {
        if(!empty($_POST["delnum"]) && !empty($_POST["delpass"])){
            // Form is filled out fully and correctly
            $delnum = $_POST["delnum"];
            $delpass = $_POST["delpass"];
            
            $sql = 'DELETE FROM mission5 WHERE id=:id AND password=:password';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $delnum, PDO::PARAM_INT);
            $stmt->bindParam(':password', $delpass, PDO::PARAM_STR);
            $stmt->execute();
          } else {
            // Error msg for when form is not filled out
            $error_msg = "<span class='error'>Error: please fill in the fields</span><br>";
          }
      }
          
           // 編集機能
     if (isset($_POST["submit_3"])) {
      if (!empty($_POST["ednum"]) && !empty($_POST["edpass"])){
        // Form is filled out fully and correctly
        $ednum =$_POST["ednum"];    
        $edpass=$_POST["edpass"];

        $sql = 'SELECT * FROM mission5 WHERE id=:id AND password=:password';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$ednum, PDO::PARAM_INT);
        $stmt->bindParam(':password', $edpass, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach($results as $row) {
          $name = $row['name'];
          $comment= $row['comment'];
          $id_update = $row['id'];
          $pass_update = $row['password'];
        }

      } else {
        // Error msg for when form is not filled out
        $error_msg = "<span class='error'>Error: please fill in the fields</span><br>";
      }
     }
    ?>
     
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p>【投稿フォーム】</p>
        <label>名前:</label>
        <input type="text" name="name" id="name"
               value = "<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"><br>
        <label>コメント:</label>
        <input type="text" name="comment" id="comment"
               value = "<?php echo htmlspecialchars($comment, ENT_QUOTES); ?>"><br>
        <label>パスワード:</label>
        <input type="password" name="password" id="password"
               value=""><br>
        <!-- ID Form for updates (hidden) -->
        <input type="hidden" name="id_update" value="<?php echo htmlspecialchars($id_update, ENT_QUOTES);?>">
        <!-- Password Form for updates (hidden) -->
        <input type="hidden" name="pass_update" value="<?php echo htmlspecialchars($pass_update, ENT_QUOTES); ?>">
        <input type="submit" class="btn btn-info" name= "submit_1" value = "送信"><br><br>
        
         
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> 
        <p>【削除フォーム】</p>
        <label>投稿番号:</label><input type="number" name="delnum" id="delnum" ><br>
        <label>パスワード:</label><input type="password" 
                name="delpass" id="delpass" value=""><br>
        <input type= "submit" class="btn text-white bg-dark" name= "submit_2" value="削除"><br><br>
   
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> 
        <P>【編集フォーム】</P>
        <label>投稿番号:</label><input type="number" name="ednum" id="ednum" ><br>
        <label>パスワード:</label><input type="password" 
                name="edpass" id="edpass" value=""><br>
        <input type="submit"  class= "btn btn-warning" name= "submit_3" value="編集">
    </form>
        
    <style>
          label{
                width:100px;
                }
        </style>  
    </form>
     
     
    <?php 
      // Show error msg if there is one (エラーメッセージの表示)
      if ($error_msg != "") {
        echo $error_msg;
      }

      // TODO: Show database contents (データの表示)
      $sql = 'SELECT * FROM mission5';
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      echo "<hr>";
      foreach($results as $row) {
        echo $row['id'] . " " . $row['name'] . " " . $row['comment'] . " " . $row['date'] . "<br>";
      }
      echo "<hr>";
    ?>

</body>
</html>


