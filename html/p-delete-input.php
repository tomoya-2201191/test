<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>商品削除</title>
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
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
            <a href="#">ログアウト</a>
            
        </div>
    </header>
    <div class="name">
        <u><p>商品削除</p></u>
        削除したい商品を選択してください
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="m-home.php">ホーム</a></li>
                    <ul>
                    <li><a href="p-insert-input.php">商品登録</a></li>
                    <li><a href="p-delete-input.php">商品削除</a></li>
                    <li><a href="p-update-input.php">更新</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main">
            <table>
                <?php
                    $pdo=new PDO($connect, USER, PASS);
                    foreach($pdo->query('select * from product') as $row){
                        echo '<div class="frame">';
                        echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
                        echo '<div class="detail">';
                        echo '<p>',$row['id'],'</p>';
                        echo '<p>',$row['name'],'</p>';
                        echo '<p>',$row['category'],'</p>';
                        echo '<p>',$row['size'],'</p>';
                        echo '<p>',$row['price'],'</p>';
                        echo '<p>',$row['outline'],'</p>';
                        echo '<p>',$row['stock'],'</p>';
                        echo '<p>',$row['sales'],'</p>';
                        echo '</div>';
                        echo '<form action="p-delete-output.php" method="post">';
                        echo '<input type="hidden" name="id" value="',$row['id'],'">';
                        echo '<button type="submit" class="button3">削除</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                ?>
            </table>
            <form action="m-home.php" method="post">
                <input type="submit" value="ホームへ戻る" class="button2">
            </form>
        </div>
    </div>
</body>
</html>