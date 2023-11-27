<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>home</title>
</head>
<body>
<div class="home">
        <div class="shopping-cart">
            <a href="#">買い物カゴ</a>
        </div>
    <div class="name"></div>
            <u><p>商品検索</p></u>
    </div>
  </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="price.php" method="post">
            <input type="text" class="p_text" name="keyword1" placeholder="0">
            〜
            <input type="text" class="p_text" name="keyword2" placeholder="1000">
            <input type="submit" class="button" value="検索">
        </form>
        </div>
        <?php
    echo '<table>';
    $pdo=new PDO($connect, USER, PASS);
    if (isset($_POST['keyword1'], $_POST['keyword2'])) {
        $sql=$pdo->prepare('select * from product where price >= ? and price <= ?');
        $sql->execute([$_POST['keyword1'], $_POST['keyword2']]);
        foreach ($sql as $row) {
            $id=$row['id'];
            echo '<tr>';
            echo '<td>';
            echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
            echo '</td>';
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