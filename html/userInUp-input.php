<?php session_start(); ?>

<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>ユーザー情報更新</title>
</head>
  <style>
    .parent ul{
      display: none;
    }
    .active ul {
      display: block;
    }
    
    .txt{
       width: 200px;
       height: 30px; 
    }
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
        <?php
            if(isset($_SESSION['customer'])){
              echo '<a href="logout.php">ログアウト</a>';
            }else{
              echo '<a href="login.php">ログイン</a>';
            }
          ?>
        </div>
    </header>
    <div class="shopping-cart">
      <a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
    </div>

    <div class="name">
            <u><p>ユーザー情報更新</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="userInUp-output.php" method="post">
          <?php
          $pdo = new PDO($connect,USER,PASS);
          if(isset($_SESSION['customer'])){
          $sql = $pdo->prepare('select * from customer where id=?');
          $sql->execute([$_SESSION['customer']['id']]);
          $row = $sql->fetch();
            echo '<p>名　　　　　前　　<input type="text" class="txt" name="name"  value="',$row['name'],'"></p>';
            echo '<p>メールアドレス　　<input type="text" class="txt" name="mail_adress"  value="',$row['mail_adress'],'"></p>';
            echo '<p>住　　　　　所　　<input type="text" class="txt" name="adress"  value="',$row['adress'],'"></p>';
            echo '<p>電　話　番　号　　<input type="text" class="txt" name="tel"  value="',$row['tel'],'"></p>';
            echo '<a href="passChg-input.php">パスワードの変更はこちら</a>';
            echo '<p></p>';
            echo '<button type="submit" class="B1">変更</button>';
            echo '</form>';
          }else {
            echo '<h3>ユーザー情報を更新するには、ログインしてください。</h3>';
          }
          ?>
          
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>