<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>商品検索</title>
</head>
  
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
          <!--検索選択リンク-->
          <a class="p_name" href="product.php">商品名</a>
          <a class="p_category" href="category.php">カテゴリ</a>
          <a class="p_price" href="price.php">価格</a>
</div>
</body>
</html>