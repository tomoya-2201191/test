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
    a{
      text-decoration:none;
    }
    .b1{
      width: 100px;
      height: 70px;
      padding: 10px;
      background-color: gley;
      font-size: 25px;
      border-radius:5px;
    }
    .b2{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: rgb(20, 230, 146);
      font-size: 25px;
      border-radius:5px;
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
            <u><p>ユーザー情報更新完了</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class = "main">
          <br>
          <?php
          $pdo = new PDO('mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1516821-asoclothes;charset=utf8',
          'LAA1516821','Pass0726');
          $sql=$pdo->prepare('update customer set name=?,mail_adress=?,adress=?,tel=? where id=?');
          if(empty($_POST['name'] || empty($_POST['mail_adress'] || empty($_POST['tel'])) )) {
            echo "<h3>※入力項目を入力してください</h3>";
            echo '<form action="userInUp-input.php" method="post">
                  <button type="submit" class="b1">戻る</button>
                  </form>';
          }else{
            $sql->execute([
              $_POST['name'],$_POST['mail_adress'],$_POST['adress'],$_POST['tel'],$_SESSION['customer']['id']
            ]);
            $_SESSION['customer'] = $sql->fetch();
            echo '<h3>ユーザー情報を更新しました。</h3>';
            echo '<form action="home.php" method="post">
                  <button type="submit" class="b2">ホームへ戻る</button>
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