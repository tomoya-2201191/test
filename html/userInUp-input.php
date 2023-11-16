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
            <u><p>ユーザー情報更新</p></u>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="home.php">ホーム</a></li><br>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="ranking.php?category=アウター">アウター</a></li>
                      <li><a href="ranking.php?category=トップス">トップス</a></li>
                      <li><a href="ranking.php?category=ボトムス">ボトムス</a></li>
                      <li><a href="ranking.php?category=インナー">インナー</a></li>
                      <li><a href="ranking.php?category=小物">小物</a></li>
                    </ul>
                  </li><br>
                <li><a href="#">ユーザー情報更新</a></li><br>
                <li><a href="productSearch.php">商品検索</a></li><br>
            </ul>
        </div>
        <div class="main">
        <form action="userInUp-output.php" method="post">
            <p>名前<input type="text" name="name"  placeholder="name"></p>
            <p>メールアドレス<input type="text" name="mail_adress"  placeholder="mail_adress"></p>
            <p>住所<input type="text" name="adress"  placeholder="adress"></p>
            <p>電話番号<input type="text" name="tel"  placeholder="tel"></p>
            <a href="passChg-input.php">パスワードの変更はこちら</a>
            <p></p>
            <button type="submit">変更</button>
        </form>
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>