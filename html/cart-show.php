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
<?php //require 'menu.php'; ?>
<?php //require 'cart.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id=$_POST['id'];
$cartcount=$_POST['count'];
// echo $id;
// var_dump($_SESSION);
//  $cartcount = $_SESSION['product'][$id]['count'];
// echo $cartcount;
// echo '確認';

// echo $_POST['action'];

if (isset($_POST['action']) && $_POST['action'] == 'increase') {
    
    $cartcount = $cartcount + 1;
   
    // echo $cartcount;
    // echo '確認２';
}

if (isset($_POST['action']) && $_POST['action'] == 'decrease' && $_SESSION['product'][$id]['count'] > 0) {
    $cartcount = $cartcount - 1;;
}
}




if (!empty($_SESSION['product'])){
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th>';
    echo '<th>価格</th><th></th><th>個数</th><th></th><th>小計</th><th></th></tr>';
    $total=0;
    $count=0;
    foreach ($_SESSION['product'] as $id=>$product){
        // $cartcount = $_SESSION['product'][$id]['count'];
        if(!(isset($cartcount))){
            $cartcount = $_SESSION['product'][$id]['count'];
        }
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td><a href="detail.php?id=', $id, '">',
             $product['name'], '<a></td>';
        echo '<td>', $product['price'], '</td>';
        echo '<form action="cart-show.php" method="post">';
        echo '<td><button type="submit" name="action" value="decrease" >減らす</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id" id="',$id,'"></td>';
        echo '<td><input type="hidden" value="',$cartcount, '"name="count" id="',$id,'"></td>';

        // echo '<td>  <a href="cart-show.php?id=', $id, '">-</a> <td>';
        echo '</form>';
        echo '<td>',$cartcount,'</td>';
        $_SESSION['product'][$id]['count'] = $cartcount;
        echo '<form action="cart-show.php" method="post">';
        echo ' <td><button type="submit" name="action" value="increase">増やす</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id"></td>';
        echo '<td><input type="hidden" value="',$cartcount, '"name="count"></td>';
        // echo '<td> <a href="cart-show.php?id=', $id, '">+</a> <td>';
        echo '</form>';
        $subtotal=$product['price']*$cartcount;
        $total+=$subtotal;
        echo '<td>', $subtotal, '</td>';
       
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
        

    }
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>',$total,
         '</td><td></td></tr>';
    echo '</table>';

}else {
    echo 'カートに商品がありません。';
}

?>

<?php

echo '<form action="paymentInformation.php" method="post">';
if(isset($_SESSION['product'])){
echo '<input type="submit" value="購入へ進む">';
  }
    
?>

<?php require 'footer.php'; ?>
