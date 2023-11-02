<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/frame.css">
    <title>ranking</title>
    <style>
        .parent ul{
        display: none;
        }
        .active ul {
        display: block;
        }
        a{
        text-decoration:none;
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
            <u><p>ランキング</p></u>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="home.php">ホーム</a></li><br>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="">アウター</a></li>
                      <li><a href="">トップス</a></li>
                      <li><a href="">ボトムス</a></li>
                      <li><a href="">インナー</a></li>
                      <li><a href="">小物</a></li>
                    </ul>
                  </li><br>
                <li><a href="#">ユーザー情報更新</a></li><br>
                <li><a href="productSearch.php">商品検索</a></li><br>
            </ul>
        </div>
        <div class="main">
          <?php
            $pdo= new PDO($connect,USER,PASS);
            
           
          ?>
        </div>
        
        <script>
          function func1(e) {
            e.classList.toggle("active");
          }
        </script>
</body>
</html>