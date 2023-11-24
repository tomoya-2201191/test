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
    a {
      text-decoration:none;
    }
    .b1{
            width: 100px;
            height: 70px;
            margin-left: 100px;
            padding: 10px;
            background-color: rgb(255, 192, 4);
            font-size: 25px;
            border-radius:5px;
        }
    h3{
      text-align: center;
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
            echo '<button type="submit" class="b1">変更</button>';
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