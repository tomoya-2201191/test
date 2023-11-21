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

// ボタンを押したか確認
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id=$_POST['id'];
$cartcount[$id]=$_POST['count'];

// var_dump($_SESSION);

// echo $_POST['action'];

if (isset($_POST['action']) && $_POST['action'] == 'increase') {
    
    $cartcount[$id] = $cartcount[$id] + 1;
   
    // echo $cartcount;
    // echo '確認２';
}

if (isset($_POST['action']) && $_POST['action'] == 'decrease' && $_SESSION['product'][$id]['count'] > 0) {
    $cartcount[$id] = $cartcount[$id] - 1;;
}
}



// 商品表示
if (!empty($_SESSION['product'])){
    
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th>';
    echo '<th>価格</th><th></th><th>個数</th><th></th><th></th><th>　　　　小計</th><th></th></tr>';
    $total=0;
    $count=0;
    foreach ($_SESSION['product'] as $id=>$product){
        // $cartcount = $_SESSION['product'][$id]['count'];

        if(!(isset($cartcount[$id]))){
            $cartcount[$id] = $_SESSION['product'][$id]['count'];
        }
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td><a href="detail.php?id=', $id, '">',
             $product['name'], '<a></td>';
        echo '<td>', $product['price'], '</td>';
        echo '<form action="cart-show.php" method="post">';
        echo '<td><button type="submit" name="action" value="decrease" >-</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id" id="',$id,'"></td>';
        echo '<td><input type="hidden" value="',$cartcount[$id], '"name="count" id="',$id,'"></td>';

        echo '</form>';
        echo '<td>',$cartcount[$id],'</td>';
        $_SESSION['product'][$id]['count'] = $cartcount[$id];
        echo '<form action="cart-show.php" method="post">';
        echo ' <td><button type="submit" name="action" value="increase">+</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id"></td>';
        echo '<td><input type="hidden" value="',$cartcount[$id], '"name="count"></td>';
        
        echo '</form>';

        //  var_dump($product['price']);
        //  var_dump($cartcount);

        $subtotal=$product['price']*$cartcount[$id];
        $total+=$subtotal;
        echo '<td>', $subtotal, '</td>';
       
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
        

    }
    echo '<tr><td><br>';
    echo '<br></tr></td>';
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
echo '<br><input type="submit" value="購入へ進む">';
  }
    
?>

<?php require 'footer.php'; ?>
