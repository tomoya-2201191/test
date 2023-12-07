<?php
  session_start();
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
    <title>ランキング</title>
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
    .genre{
      text-align: right;
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
    <div class="name">
            <u><p>ランキング</p></u>
            <div class="genre">
              <?php
              echo '現在選択中のジャンル : ',$_GET['category'];
              ?>
            </div>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="home.php">ホーム</a></li>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="ranking.php?category=アウター">アウター</a></li>
                      <li><a href="ranking.php?category=トップス">トップス</a></li>
                      <li><a href="ranking.php?category=ボトムス">ボトムス</a></li>
                      <li><a href="ranking.php?category=シューズ">シューズ</a></li>
                      <li><a href="ranking.php?category=小物">小物</a></li>
                    </ul>
                  </li>
                <li><a href="userInUp-input.php">ユーザー情報更新</a></li>
                <li><a href="productSearch.php">商品検索</a></li><br>
            </ul>
        </div>
        <div class="main">
          <?php
            $pdo= new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('select * from product '.
            'where category = ? order by sales DESC');
            $sql->execute([$_GET['category']]);
            $i = 1;
            echo '<table>';
            foreach($sql as $row){
              //echo '<div class="flex">';
              echo '<tr>';
              echo '<td>';
              if($i == 1){
                echo '<img src="../img/top.png" height="100" width="120">';
              }else if($i == 2){
                echo '<img src="../img/second.png" height="100" width="120">';
              }else if($i == 3){
                echo '<img src="../img/third.png" height="100" width="120">';
              }else{
                echo $i,'位';
              }
              $id=$row['id'];
              echo '</td>';
              echo '<td>';
              echo '<p><a href="detail.php?id=', $id, '"><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
              echo '</td>';
              echo '<td>';
              echo '<a href="detail.php?id=', $row['id'], '">', $row['name'], '</a>';
              echo '</td>';
              echo '<td></td><td></td><td></td><td></td>';
              echo '<td>¥', $row['price'], '<br><br>',$row['category'],'<br><br>','size:',$row['size'], '</td>';
              echo '<td><input type="hidden" value="',$row['sales'],'"></td>';
              echo '</tr>';
              //echo '</div>';
              $i++;
            }
            echo '</table>';
          ?>
        </div>
        
        <script>
          function func1(e) {
            e.classList.toggle("active");
          }
        </script>
</body>
</html>