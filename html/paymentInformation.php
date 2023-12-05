<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<link rel="stylesheet" href="../css/frame.css">
<style>
    .pay {
        width: 100%;
        background-color: #76e2d8;
        padding-top: 10px;
        padding-left: 10px;
    }
</style>
<div class="shopping-cart">
<a href="cart-show.php">買い物カゴ</a>
</div>
<div class="name"></div>
<u><p>支払い方法</p></u>
</div>

<?php require 'header.php'; ?>

<?php
    echo '<div class="main">';
    // echo 'セッション確認',$_SESSION['customer']['id'];
     if(isset($_SESSION['customer'])){

        
        echo    '<form action="purchase-input.php" method="post">';
        echo    '<div class="pay">支払い方法';
        echo    '<hr>';
        echo    '</div>';
        echo    '<br>';
        echo     '<br>';
        echo    '<input type="radio" name="cash" value="クレジットカード">クレジットカード';
        echo    '<br>';
        echo    '<br>';
        echo    '<input type="radio" name="cash" value="コンビニ">コンビニ';
        echo    '<br>';
        echo    '<br>';
        echo    '<input type="radio" name="cash" value="代引き">代引き';
        echo    '<br>';
        echo    '<br>';
        echo    '<input type="submit" class="button4" id="b1" value="注文情報確認へ">';
        echo    '</form>';
        echo    '<hr>';
        echo    '<br>';
        echo    '<br>';
        echo    '<button class="b2" onclick="location.href=\'cart-show.php\'">戻る</button>';

        
     }else{
         echo '<h3>ログインしてください。</h3>';
     }
    echo '</div>'; 
 
?>
<?php require 'footer.php'; ?>

    
