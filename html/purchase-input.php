<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>確認画面</p></u>';
echo '</div>';
echo '</div>';
?>
<?php require 'header.php'; ?>
<?php

  if(isset($_SESSION['customer'])){
    if (isset($_POST['cash'])){

require 'cart.php';

echo '<hr>';
echo '<table>';
echo '<tr>';
echo '<td>決　済　方　法　　　',$_POST['cash'],'</td>';
echo '</tr>';

echo '<tr>';
echo '<td>住　　　　　所　　　',$_SESSION['customer']['address'],'</td>';
echo '</tr>';

echo '<tr>';
echo '<td>名　　　　　前　　　',$_SESSION['customer']['name'],'</td>';
echo '</tr>';

echo '<tr>';
echo '<td>メールアドレス　　　',$_SESSION['customer']['mail'],'</td>';
echo '</tr>';
echo '<table>';
echo '</hr>';

echo '<hr>';
 if(isset($_SESSION['product'])){
echo '内容をご確認いただき、購入を確定してください。<br>';
echo '<a href="purchase-output.php">購入を確定する</a>';
echo '</hr>';
 }else {

 }

 }else{
    echo '<p>お支払方法を選択してください。</p>';
    echo '<form action="paymentInformation.php" methods="post">';
    echo '<input type="submit" class="b2" value="戻る">';
    
}

  }else{
      echo 'ログイン又は新規登録をお願いいたします。';

  }
?>
<?php require 'footer.php'; ?>
