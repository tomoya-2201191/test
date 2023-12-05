<?php require 'dbconnect.php'; ?>
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
    <div class="name"></div>
            <u><p>商品検索</p></u>
    </div>
  </div>
    <?php require 'header.php'; ?>
<?php
echo '<div class="detail">';
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_GET['id']]);
foreach ($sql as $row) {
    echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="230" width="260"></p>';
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>商品名：', $row['name'], '</p>';
    echo '<p>価格：¥', $row['price'], '</p>';
    echo '<p>カテゴリ：', $row['category'], '</p>';
    echo '<p>サイズ：', $row['size'], '</p>';
    echo '<p>注文数：<select name="count">';

    if($row['stock']<10){
        for ($i=1; $i<=$row['stock']; $i++) {
            echo '<option value="', $i, '">', $i, '</option>';
        }
    }else{
        for ($i=1; $i<=10; $i++) {
            echo '<option value="', $i, '">', $i, '</option>';
        }
    }

    echo '</select></p>';
    echo '<p>概要：', $row['outline'], '</p>';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'], '">';
    echo '<input type="hidden" name="size" value="', $row['size'], '">';
    if($row['stock']==0){
        echo '<font color=red>※在庫がありません</font>';
    }else{
        echo '<p><input type="submit" id="button4" value="買い物かごに入れる"></p>';
    }
    echo '</form>';
}
echo '</div>';
?>
</body>
</html>