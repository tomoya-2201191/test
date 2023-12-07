<?php session_start();?>
<?php require 'dbconnect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>パスワード変更</title>
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
            <u><p>パスワード変更</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="passChg-output.php" method="post">
                        <p>旧パスワード入力
                          <input type="password" class="txt" name="pass1"></p>
                        <p>新パスワード入力
                          <input type="password" class="txt" name="pass2"></p>
                        <p>パスワード再入力
                          <input type="password" class="txt" name="pass3"></p>
                      <p></p>
                      <button type="submit" class="B1">変更</button>
                      
                    </form>
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>