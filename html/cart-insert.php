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
<?php
$id=$_POST['id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product']=[];
}
$count=0;

if (isset($_SESSION['product'][$id])){
    $count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
    'id'=>$_POST['id'],
    'name'=>$_POST['name'],
    'price'=>$_POST['price'],
    'count'=>$count+$_POST['count']   
];

echo '<p>カートに商品を追加しました';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>

