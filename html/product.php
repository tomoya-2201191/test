<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/frame.css">
    <title>home</title>
</head>
<body>
<div class="home">
        <div class="shopping-cart">
            <a href="#">買い物カゴ</a>
        </div>
    <div class="name">
            <u><p>商品検索</p></u>
    </div>
</div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="product.php" method="post">
        <input type="text" class="text" name="keyword" placeholder="商品名">
        <input type="submit" class="button" value="検索">
        </form>
        </div>
    <?php
    echo '<table>';
    $pdo=new PDO($connect, USER, PASS);
    if (isset($_POST['keyword'])) {
        $sql=$pdo->prepare('select * from product where name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
        echo '<tr><th>商品名</th><th>価格</th><th>カテゴリー</th></tr>';
        foreach ($sql as $row) {
            $id=$row['id'];
            echo '<tr>';
            echo '<td>';
            echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
            echo '</td>';
            echo '<td>', $row['price'], '</td>';
            echo '<td>', $row['category'], '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</body>
</html>