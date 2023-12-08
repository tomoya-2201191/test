<?php session_start(); ?>
<title>カート</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<div class="shopping-cart">
<a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
</div>
<div class="name"></div>
<u><p>カート</p></u>
</div>

<?php require 'header.php'; ?>
<?php
unset($_SESSION['product'][$_GET['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php';
echo '<br>';
echo '<form action="home.php" method="post">';
echo '<br>';
echo '<tr><td><input type="submit" class="button5"  value="買い物を続ける"></td></tr>';
echo '</form>';
?>
<?php require 'footer.php'; ?>

