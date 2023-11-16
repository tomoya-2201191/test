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
    <div class="name"></div>ユーザー情報更新完了
            <u><p></p></u>
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
                <li><a href="userInUp-input.php">ユーザー情報更新</a></li><br>
                <li><a href="productSearch.php">商品検索</a></li>
            </ul>
        </div>

        <div class = "main">
          ?>
          <?php
          $pdo = new PDO('mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1516821-asoclothes;charset=utf8',
          'LAA1516821','Pass0726');
          $sql=$pdo->prepare('update customer set name=?,mail_adress=?,adress=?,tel=?'); 
          if ($sql->execute([
            $_POST['name'],$_POST['mail_adress'],$_POST['adress'],$_POST['tel']
          ])) {
            echo 'ユーザー情報を更新しました。';
          } else {
            echo '更新に失敗しました。';
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