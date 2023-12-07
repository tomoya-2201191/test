<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>

<title>カート</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<div class="shopping-cart">
<a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
</div>
<div class="name"></div>
<u><p>カート</p></u>
</div>

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
 echo '<tr><td><input type="submit" id="button5" value="買い物を続ける"></td></tr>';
 echo '</form>';
?>
<?php require 'footer.php'; ?>

