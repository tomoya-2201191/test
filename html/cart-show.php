<?php session_start(); ?>
<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/frame.css">
    <title>ASO CLOTHES</title>
  <style>
    .flex{
    display: flex;
    
    }
    .flex>p{
        width: 25%;
    }
    .main{
      text-align: center;
    }
    .b1{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: rgb(255, 192, 4);
      font-size: 25px;
      border-radius:5px;
    }
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
        <?php
            if(isset($_SESSION['customer'])){
              echo '<a href="logout.php">ログアウト</a>';
            }else{
              echo '<a href="login.php">ログイン</a>';
            }
          ?>
        </div>
    </header>
        <div class="shopping-cart">
            <a href="cart-show.php">買い物カゴ</a>
        </div>
    <div class="name"></div>
            <u><p>買い物カゴ</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
        <?php

// ボタンを押したか確認

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id=$_POST['id'];
$cartcount[$id]=$_POST['count'];

$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$id]);
foreach ($sql as $row) {
    $stock = $row['stock'];
}

// ボタンの判定
if (isset($_POST['action']) && $_POST['action'] == 'increase') {
    // 在庫確認
    $cartcount[$id] = $cartcount[$id] + 1;
    if($stock-$cartcount[$id] <= 0 ){
        echo '在庫がありません。';
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
            if($row['stock'] == 0){
                echo $row['name'];
                echo '　サイズ',$row['size'];
                echo '<br>';
                echo 'こちらの商品は在庫がありません。削除をお願いします。';
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
       
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
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

    echo '<table>';
    echo '<form action="home.php" method="post">';
    echo '<tr><td><input type="submit" class="b2" value="買い物を続ける"></td>';
    echo '</form>';
    if(!isset($zerostock)){
    echo '<form action="paymentInformation.php" method="post">';
    echo '<td><input type="submit" class="b1" value="購入へ進む"></td></tr>';
    echo '</form>';
    }
    echo '</table>';
  }

  
echo '</div>';
echo '</div>';

?>
        </div>
        
        <script>
          function func1(e) {
            e.classList.toggle("active");
          }
        </script>
</body>
</html>

