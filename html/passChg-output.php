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
    .active ul {
      display: block;
    }
    .main {
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
            <a href="cart-show.php">買い物カゴ</a>
        </div>
    <div class="name"></div>
            <u><p>パスワード変更完了</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class = "main">
          <br>
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
          if(empty($_POST['pass1'] || empty($_POST['pass2'] || empty($_POST['pass3'])) )) {
            echo "<h3>※入力項目を入力してください</h3>";
            echo '<form action="passChg-input.php" method="post">
                  <button type="submit" class="b2">戻る</button>
                  </form>';
          } else if(password_verify($_POST['pass1'],$_SESSION['customer']['pass']) != true){
            echo "<h3>※旧パスワードが一致しません。</h3>";
            echo '<form action="passChg-input.php" method="post">
                  <button type="submit" class="b2">戻る</button>
                  </form>';
          }else if($_POST['pass2'] !== $_POST['pass3']){
            echo "<h3>※パスワードが一致しません。</h3>";
            echo '<form action="passChg-input.php" method="post">
                  <button type="submit" class="b2">戻る</button>
                  </form>';
          }else{
            $sql->execute([password_hash($_POST['pass3'], PASSWORD_DEFAULT),$_SESSION['customer']['id']]);
            echo '<h3>ユーザー情報を更新しました。</h3>';
            echo '<form action="home.php" method="post">
                  <button type="submit" class="b3">ホームへ戻る</button>
                  </form>';
          }
          ?>
        
        <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>