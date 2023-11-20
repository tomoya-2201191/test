<?php session_start(); ?>
<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>商品検索</p></u>';
echo '</div>';
echo '</div>';
?>

<?php require 'header.php'; ?>
<?php
unset($_SESSION['product'][$_GET['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php'
?>
<?php require 'footer.php'; ?>

