<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>ユーザー情報更新完了</title>
</head>
  <style>
    .parent ul{
      display: none;
    }
    .active {
      /*background-color: lightyellow;*/
    }
    .active ul {
      display: block;
    }
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
            <a href="login.php">ログイン</a>
            
        </div>
    </header>
        <div class="shopping-cart">
            <a href="cart-show.php">買い物カゴ</a>
        </div>
    <div class="name"></div>
            <u><p>ユーザー情報更新完了</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class = "main">
          <?php
          $pdo = new PDO('mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1516821-asoclothes;charset=utf8',
          'LAA1516821','Pass0726');
          $sql=$pdo->prepare('update customer set name=?,mail_adress=?,adress=?,tel=? where id=?');
          $error_message = "";
          if(empty($_POST['name'] || empty($_POST['mail_adress'] || empty($_POST['tel'])) )) {
            echo $error_message = "※入力項目を入力してください";
          }else{
            $sql->execute([
              $_POST['name'],$_POST['mail_adress'],$_POST['adress'],$_POST['tel'],$_SESSION['customer']['id']
            ]);
            echo 'ユーザー情報を更新しました。';
          }
          ?>
        <form action="home.php" method="post">
        <button type="submit">ホームへ戻る</button>
        </form>
        <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>