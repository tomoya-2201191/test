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
    <div class="name"></div>ユーザー情報更新完了
            <u><p></p></u>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="#">ホーム</a></li>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="">アウター</a></li>
                      <li><a href="">トップス</a></li>
                      <li><a href="">ボトムス</a></li>
                      <li><a href="">インナー</a></li>
                      <li><a href="">小物</a></li>
                    </ul>
                  </li>
                <li><a href="#">ユーザー情報更新</a></li>
                <li><a href="productSearch.php">商品検索</a></li>
            </ul>
        </div>
        <div class = "main">
        <?php
          $error_message = "";
          
          if(!empty($error_message)){
            echo $error_message;
          }
          ?>
          <?php
          $pdo = new PDO('mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1516821-asoclothes;charset=utf8',
          'LAA1516821','Pass0726');
          $sql=$pdo->prepare('update customer set pass=? where id=?'); 
          $error_message = "";
          if(empty($_POST['pass1'] || empty($_POST['pass2'] || empty($_POST['pass3'])) )) {
            echo $error_message = "※入力項目を入力してください";
          } else if($_POST['pass1'] !== $_SESSION['customer']['pass']){
            echo $error_message = "※旧パスワードが一致しません。";
          }else if($_POST['pass2'] !== $_POST['pass3']){
            echo $error_message = "※パスワードが一致しません。";
          }else{
            $sql->execute([$_POST['pass3'],$_SESSION['customer']['id']]);
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