<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
<?php
echo '<div class="shopping-cart">';
echo '<a href="cart-show.php">買い物カゴ</a>';
echo '</div>';
echo '<div class="name"></div>';
echo '<u><p>支払方法</p></u>';
echo '</div>';
?>
<?php require 'header.php'; ?>

<?php
    echo '<div class="main">';
    // echo 'セッション確認',$_SESSION['customer']['id'];
     if(isset($_SESSION['customer'])){

        
        echo    '<form action="purchase-input.php" method="post">';
        echo    '<a class="pay">決済方法</a>';
        echo    '<hr>';
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
         echo 'ログインしてください。';
     }
    echo '</div>'; 
 
?>
<?php require 'footer.php'; ?>

    
