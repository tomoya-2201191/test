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
            <a href="login.php">ログイン</a>
        </div>
    </header>
    <div class="shopping-cart">
        <a href="cart-show.php">買い物カゴ</a>
    </div>
    <div class="name"></div>
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
              echo $i,'位';
              echo '</td>';
              echo '<td>';
              echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
              echo '</td>';
              echo '<td>';
              echo '<a href="detail.php?id=', $row['id'], '">', $row['name'], '</a>';
              echo '</td>';
              echo '<td></td><td></td><td></td><td></td>';
              echo '<td>¥', $row['price'], '<br>',$row['category'],'<br>',$row['size'], '</td>';
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