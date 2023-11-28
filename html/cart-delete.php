<?php session_start(); ?>
<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>カート</p></u>';
echo '</div>';
echo '</div>';
?>

<?php require 'header.php'; ?>
<?php
unset($_SESSION['product'][$_GET['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php';
echo '<br>';
echo '<form action="home.php" method="post">';
 echo '<tr><td><input type="submit" value="買い物を続ける"></td></tr>';
 echo '</form>';
?>
<?php require 'footer.php'; ?>

