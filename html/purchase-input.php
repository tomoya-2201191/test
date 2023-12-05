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
  $pdo = new PDO($connect,USER,PASS);
  if(isset($_SESSION['customer'])){
    if (isset($_POST['cash'])){
      $sql = $pdo->prepare('select * from customer where id = ?');
      $sql->execute([$_SESSION['customer']['id']]);
      $row = $sql->fetch();

      require 'cart.php';
      echo '<br>';
      echo '<hr>';
      echo '<table>';
      echo '<tr>';
      echo '<td>決　済　方　法　　　',$_POST['cash'],'</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>住　　　　　所　　　',$row['adress'],'</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>名　　　　　前　　　',$row['name'],'</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>メールアドレス　　　',$row['mail_adress'],'</td>';
      echo '</tr>';
      echo '</table>';
      echo '<br>';
      echo '<form action="userInUp-input.php" method="post">';
      echo '<input type="submit" id="button5" value="ユーザー更新はこちら"></td>';
      echo '</form>';
      

      echo '<hr>';
      echo '<br>';
      if(isset($_SESSION['product'])){
      echo '内容をご確認いただき、購入を確定してください。<br>';
      echo '<button type="button" class="b2" onclick="location.href=\'paymentInformation.php\'">戻る</button>';
      echo '　　　';
      echo '<button type="button" id="b1" onclick="location.href=\'purchase-output.php\'">購入を確定する</button>';

 }

 }else{
    echo '<h3>お支払方法を選択してください。</h3>';
    echo '<form action="paymentInformation.php" methods="post">';
    echo '<input type="submit" class="b2" value="戻る">'; 
    echo '</form>';   
}

  }else{
      echo '<h3>ログイン又は新規登録をお願いいたします。</h3>';

  }
?>
<?php require 'footer.php'; ?>
