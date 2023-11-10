<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>

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
 if(isset($_SESSION['customer'])){

require 'cart.php';

echo '<hr>';
echo '決済方法　　　　　　　　　　';
echo $_POST['cash'];
echo '<br>';
echo '住所　　　　　　　　　　　　',$_SESSION['customer']['address'];
echo '<br>';
echo '名前　　　　　　　　　　　　',$_SESSION['customer']['name'];
echo '<br>';
echo 'メールアドレス　　　　　　　　　　　　',$_SESSION['customer']['mail_adress'];
echo '<br>';
echo '</hr>';

echo '<hr>';
 if(isset($_SESSION['product'])){
echo '内容をご確認いただき、購入を確定してください。<br>';
echo '<a href="purchase-output.php">購入を確定する</a>';
echo '</hr>';
 }
 }else{
     echo 'ログイン又は新規登録をお願いいたします。';

 }
?>
<?php require 'footer.php'; ?>
