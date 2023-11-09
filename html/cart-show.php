<?php session_start(); ?>
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
