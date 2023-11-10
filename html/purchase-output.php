<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<?php require 'header.php'; ?>
<?php
    if(isset($_SESSION['customer'])){
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into purchase (customer_id) value(?)');
    $sql->execute([$_SESSION['customer']['id']]);
    // customerテーブルに挿入したA.Iのcustomer.idを取得
    $last_id=$pdo->lastInsertId('id');

    foreach ($_SESSION['product'] as $item=>$product){
        $sql=$pdo->prepare('insert into purchase_detail (purchase_id, product_id, count) value(?,?,?)');
  
        $sql->execute([$last_id,$product['id'],$product['count']]);
       
        unset($_SESSION['product'],$product['id']);
    }

    echo '購入手続きが完了しました。ありがとうございます';
    }else {
        echo '購入を行うにはするには、ログインしてください。';
    }

?>
<?php require 'footer.php'; ?>