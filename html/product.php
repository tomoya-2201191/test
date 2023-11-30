<?php require 'dbconnect.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>ASO CLOTHES</title>
</head>
<body>
<div class="home">
        <div class="shopping-cart">
            <a href="cart-show.php">買い物カゴ</a>
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
        foreach ($sql as $row) {
            $id=$row['id'];
            echo '<tr>';
            echo '<td>';
            echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
            echo '</td>';
            echo '<td>';
            echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
            echo '</td>';
            echo '<td>¥', $row['price'], '</td>';
            echo '<td>', $row['category'], '</td>';
            echo '<td>', $row['size'], '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</body>
</html>