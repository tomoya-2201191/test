<?php session_start(); ?>

<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>ユーザー情報更新</title>
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
            <u><p>ユーザー情報更新</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="userInUp-output.php" method="post">
          <?php
          if(isset($_SESSION['customer'])){
            echo '<p>名前<input type="text" name="name"  value="',$_SESSION['customer']['name'],'"></p>';
            echo '<p>メールアドレス<input type="text" name="mail_adress"  value="',$_SESSION['customer']['mail'],'"></p>';
            echo '<p>住所<input type="text" name="adress"  value="',$_SESSION['customer']['address'],'"></p>';
            echo '<p>電話番号<input type="text" name="tel"  value="',$_SESSION['customer']['tel'],'"></p>';
            echo '<a href="passChg-input.php">パスワードの変更はこちら</a>';
            echo '<p></p>';
            echo '<button type="submit">変更</button>';
            echo '</form>';
          }else {
            echo 'ユーザー情報を更新するには、ログインしてください。';
          }
          ?>
          
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>