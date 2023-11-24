<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>削除確認</title>
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
        <u><p>更新</p></u>
        この商品を削除しますか？
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
                <tr><th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>サイズ</th><th>価格</th><th>概要</th><th>在庫数</th><th>画像パス</th></tr>
                <?php
                    $pdo=new PDO($connect, USER, PASS);
                    $sql=$pdo->prepare('select * from product where id=?');
                    $sql->execute([$_POST['id']]);
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<form action="p-delete.php" method="post">';
                        echo '<td>';
                        echo '<input type="hidden" name="id" value="', $row['id'], '">';
                        echo $row['id'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="hidden" name="name" value="', $row['name'], '">';
                        echo $row['name'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="hidden" name="category" value="', $row['category'], '">';
                        echo $row['category'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="hidden" name="size" value="', $row['size'], '">';
                        echo $row['size'];
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="hidden" name="price" value="', $row['price'], '">';
                        echo $row['price'];
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="hidden" name="outline" value="', $row['outline'], '">';
                        echo $row['outline'];
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="hidden" name="stock" value="', $row['stock'], '">';
                        echo $row['stock'];
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="hidden" name="jpg" value="', $row['jpg'], '">';
                        echo $row['jpg'];
                        echo '</td> ';
                        echo '<td><input type="submit" value="削除" class="button3"></td>';
                        echo '</form>';
                        echo '</tr>';
                        echo "\n";
                    }
                ?>
            </table>
            <form action="m-home.php" method="post">
                <input type="submit" value="選択画面へ戻る" class="button2">
            </form>
        </div>
    </div>    
</body>
</html>