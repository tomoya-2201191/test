<?php session_start(); ?>
<?php require 'dbconnect.php'; ?>

<link rel="stylesheet" href="../css/frame.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

<title>cart</title>
<div class="shopping-cart">
<a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
</div>
<div class="name"></div>
<u><p>カート</p></u>
</div>

<?php require 'header.php'; ?>

<?php
 echo  '<div class="main">';

// ボタンを押したか確認

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id=$_POST['id'];
$cartcount[$id]=$_POST['count'];

$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$id]);
foreach ($sql as $row) {
    $stock[$id] = $row['stock'];
}

// ボタンの判定
if (isset($_POST['action']) && $_POST['action'] == 'increase') {
    // 在庫確認
    $cartcount[$id] = $cartcount[$id] + 1;
    if($stock[$id]-$cartcount[$id] < 0 ){
        echo '<font color=red>在庫がありません。</font>';
        echo '<br>';
        echo '<a href="cart-show.php">カートに戻る</a>';
        require 'footer.php';
         exit;
    }
    
}

if (isset($_POST['action']) && $_POST['action'] == 'decrease' && $_SESSION['product'][$id]['count'] > 1 ) {
    $cartcount[$id] = $cartcount[$id] - 1;
    
    }
    

if (isset($_POST['action']) && $_POST['action'] == 'decrease' && $_SESSION['product'][$id]['count'] == 1) {
    // 在庫確認
    $sql=$pdo->prepare('select * from product where id=?');
    $sql->execute([$id]);
    foreach ($sql as $row) {
        echo $row['name'],'　';
        echo 'サイズ',$row['size'];
    }
    echo 'を削除しますか';
    echo '<br>';
    
    echo '<a href="cart-delete.php?id=', $id, '">はい</a>';
    echo '　　';
    echo '<a href="cart-show.php?">いいえ</a>';   
    require 'footer.php';
    exit;
}
}




// カートの中身があるか
if (!empty($_SESSION['product'])){

    echo 'カート<br><br>';

    echo '<table>';
    // echo '<tr><th>　　</th><th>商品名</th>';
    // echo '<th>価格</th><th></th><th>個数</th><th></th><th></th><th>　　　　小計</th><th></th></tr>';
    $total=0;
    $count=0;

    // 商品表示
    foreach ($_SESSION['product'] as $id=>$product){

        // $cartcountの中身があるか判定
        if(!(isset($cartcount[$id]))){
            $cartcount[$id] = $_SESSION['product'][$id]['count'];
        }

        
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from product where id=?');
        $sql->execute([$id]);

        // 写真を表示
        foreach ($sql as $row) {
            echo '<tr><td>';
            echo '<p><img alt="image" src="../img/', $row['jpg'], '.jpg" height="150" width="170"></p>';
            echo '</td>';
            // 在庫確認
            if($row['stock'] == 0){
                echo $row['name'];
                echo '　サイズ',$row['size'];
                echo '<br>';
                echo '<font color=red>こちらの商品は在庫がありません。削除をお願いします。</font>';
                // 在庫なし
                $zerostock = $row['stock'];


            }
        }
        
        echo '<td><a href="detail.php?id=', $id, '">',
             $product['name'], '<a></td>';
        echo '<td>¥', $product['price'], '</td>';
        // 増減ボタン
        echo '<form action="cart-show.php" method="post">';
        echo '<td><button type="submit" name="action" value="decrease" >-</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id" id="',$id,'"></td>';
        echo '<td><input type="hidden" value="',$cartcount[$id], '"name="count" id="',$id,'"></td>';

        echo '</form>';
        echo '<td>',$cartcount[$id],'</td>';
        $_SESSION['product'][$id]['count'] = $cartcount[$id];

        // 増減ボタン
        echo '<form action="cart-show.php" method="post">';
        echo ' <td><button type="submit" name="action" value="increase">+</button></td>';
        echo '<td><input type="hidden" value="',$id, '"name="id"></td>';
        echo '<td><input type="hidden" value="',$cartcount[$id], '"name="count"></td>';
        
        echo '</form>';

        $subtotal=$product['price']*$cartcount[$id];
        $total+=$subtotal;
        echo '<td>¥', $subtotal, '</td>';
       
        echo '<td><a  class="far fa-trash-alt" href="cart-delete.php?id=', $id, '"></a></td>';
        echo '</tr>';
        

    }
    echo '<tr><td><br>';
    echo '<br></tr></td>';
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>¥',$total,
         '</td><td></td></tr>';
    echo '</table>';

}else {
    echo 'カートに商品がありません。';
}

?>
 
<?php
// ログインしているか判定
if(!empty($_SESSION['product'])){
    echo '<br>';
    echo '<br>';
    echo '<table>';
    echo '<form action="home.php" method="post">';
    echo '<tr><td><input type="submit" id="button5" value="買い物を続ける"></td>';
    echo '</form>';
    // 在庫がない商品がある場合購入ボタンを消す
    if(!isset($zerostock)){
    echo '<form action="paymentInformation.php" method="post">';
    echo '<td><input type="submit" id="button4" value="購入へ進む"></td></tr>';
    echo '</form>';
    }
    echo '</table>';
  }

  
echo '</div>';
echo '</div>';

?>

<?php require 'footer.php'; ?>
