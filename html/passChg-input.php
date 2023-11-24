<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>パスワード変更</title>
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
    .b1{
            width: 100px;
            height: 70px;
            margin-left: 100px;
            padding: 10px;
            background-color: rgb(255, 192, 4);
            font-size: 25px;
            border-radius:5px;
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
            <u><p>パスワード変更</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="passChg-output.php" method="post">
                        <p>旧パスワード入力
                          <input type="password" name="pass1"></p>
                        <p>新パスワード入力
                          <input type="password" name="pass2"></p>
                        <p>パスワード再入力
                          <input type="password" name="pass3"></p>
                      <p></p>
                      <button type="submit" class="b1">変更</button>
                      
                    </form>
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>