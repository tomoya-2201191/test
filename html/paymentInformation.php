<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>
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
    echo '<div class="main">';
    // echo 'セッション確認',$_SESSION['customer']['id'];
    // if(isset($_SESSION['customer'])){
    //     $id=$_SESSION['customer']['id'];
    //     $sql=$pdo->prepare('select * from customer where id!=? and login=?');
    //     $sql->execute([$id, $_POST['login']]);
    // $pdo=new PDO($connect, USER, PASS);
    

        
        echo    '<form action="purchase-input.php" method="post">';
        echo    '<a class="pay">決済方法</a>';
        echo     '<ul>';
        echo    '<input type="radio" name="cash" value="クレジットカード">クレジットカード';
        echo    '<br>';
        echo    '<input type="radio" name="cash" value="コンビニ">コンビニ';
        echo    '<br>';
        echo    '<input type="radio" name="cash" value="代引き">代引き';
        echo    '<br>';
        echo    '</ul>';
        echo    '<button href="#">戻る</button>';
        echo    '<input type="submit" value="注文情報確認へ">';
        

    // }else{
        // echo 'ログインしてください。';
    // }
    echo '</div>';  
?>
    
