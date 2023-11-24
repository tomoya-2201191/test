<?php session_start();?>
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
    <link rel="stylesheet" href="css/frame.css">
    <title>ASO CLOTHES</title>
  <style>
    .parent ul{
      display: none;
    }
    .active ul {
      display: block;
    }
    .flex{
    display: flex;
    
    }
    .flex>p{
        width: 25%;
    }
    .main{
      text-align: center;
    }
    a {
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
            <u><p>ホーム</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
          <?php
            echo '<table>';
            $pdo= new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * from product');            
            foreach ($sql as $row) {
              $id=$row['id'];
              echo '<tr>';
              echo '<td>';
              echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
              echo '</td>';
              echo '<td>';
              echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
              echo '</td>';
              echo '<td></td><td></td><td></td><td></td>';
              echo '<td>¥', $row['price'], '<br>',$row['category'],'<br>',$row['size'], '</td>';
              echo '</tr>';
          }
          echo '</table>'
          ?>
        </div>
        
        <script>
          function func1(e) {
            e.classList.toggle("active");
          }
        </script>
</body>
</html>
