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
<?php //require 'menu.php'; ?>
<?php require 'cart.php'; ?>

<?php

echo '<form action="paymentInformation.php" method="post">';
if(isset($_SESSION['product'])){
echo '<input type="submit" value="購入へ進む">';
  }
    
?>

<?php require 'footer.php'; ?>
