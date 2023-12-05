<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>

<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>カート</p></u>';
echo '</div>';

?>

<?php require 'header.php'; ?>
<?php
$id=$_POST['id'];
// $count=$_POST['count'];

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
    'count'=>$count+$_POST['count'],
    'size'=>$_POST['size']  

];

echo '<p>カートに商品を追加しました';
echo '<hr>';
 require 'cart.php';

 echo '<form action="home.php" method="post">';
 echo '<br>';
 echo '<tr><td><input type="submit" class="button5" value="買い物を続ける"></td></tr>';
 echo '</form>';
?>
<?php require 'footer.php'; ?>

