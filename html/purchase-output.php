<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>購入</p></u>';
echo '</div>';
echo '</div>';
?>

<?php require 'header.php'; ?>
<?php
     if(isset($_SESSION['customer'])){
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into puchase (customer_id) value(?)');
    $sql->execute([$_SESSION['customer']['id']]);
    // customerテーブルに挿入したA.Iのcustomer.idを取得
    $last_id=$pdo->lastInsertId('id');

    foreach ($_SESSION['product'] as $item=>$product){
        $sql=$pdo->prepare('insert into purchase_detail (purchase_id, product_id, count) value(?,?,?)');
        $sql->execute([$last_id,$product['id'],$product['count']]);

        // $sql=$pdo->prepare('update product set sales = ? ');
        // $sql->execute($product['count']);
       
        
    

    $sql=$pdo->prepare('select * from product where id=?');
    $sql->execute([$product['id']]);
    foreach ($sql as $row) {
        $stock = $row['stock'];

        $salse=$row['sales'];

        $salse += $product['count'];
        $stock = $stock-$product['count'];

        $sql=$pdo->prepare('update product set stock = ?, sales = ? where id = ? ');
        $sql->execute([$stock,$salse, $row['id']]);
       

    }
    unset($_SESSION['product'],$product['id']);
}

    echo '<br>';
    echo '購入手続きが完了しました。ありがとうございます。';

    echo    '<br><br>';
    echo    '<form action="home.php" methods="post">';
    echo    '<input type="submit" value="ホームに戻る">';

     }else {
         echo '購入を行うにはするには、ログインしてください。';
     }

?>
<?php require 'footer.php'; ?>