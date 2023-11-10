<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>登録完了</title>
</head>
<body>
<style>
    .parent ul{
      display: none;
    }
    .active {
      /*background-color: lightyellow;*/
    }
    .active ul {
      display: block;
    }
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
            <a href="#">ログアウト</a>
            
        </div>
    </header>
    <div class="name">
        <u><p>商品登録</p></u>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="m-home.php">ホーム</a></li>
                    <ul>
                    <li><a href="p-insert-input.php">商品登録</a></li>
                    <li><a href="p-delete-input.php">商品削除</a></li>
                    <li><a href="p-update-input.php">更新</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main">
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->prepare('insert into product(name,category,size,price,outline,stock) value (?,?,?,?,?,?)');
                if(empty($_POST['name'])){
                    echo '商品名を入力してください';
                }else if(empty($_POST['category'])){
                    echo 'カテゴリを入力してください';
                }else if(empty($_POST['size'])){
                    echo 'サイズを入力してください';
                }else if(!preg_match('/^[0-9]+$/',$_POST['price'])){
                    echo '価格を整数で入力してください';
                }else if(empty($_POST['outline'])){
                    echo '概要を入力してください';
                }else if(!preg_match('/^[0-9]+$/',$_POST['stock'])){
                    echo '在庫数を整数で入力してください';
                }else if($sql->execute([$_POST['name'],$_POST['category'],$_POST['size'],$_POST['price'],$_POST['outline'],$_POST['stock']])){
                    echo '登録が完了しました';
                }else{
                    echo '登録に失敗しました';
                }
            ?>
            <br><hr><br>
            <table>
                <tr><th>商品番号</th><th>商品名</th><th>カテゴリ</th><th>サイズ</th><th>価格</th><th>概要</th><th>在庫数</th><th>売上数</th></tr>
                <?php
                    foreach($pdo->query('select * from product') as $row){
                        echo '<tr>';
                        echo '<td>',$row['id'],'</td>';
                        echo '<td>',$row['name'],'</td>';
                        echo '<td>',$row['category'],'<td>';
                        echo '<td>',$row['size'],'</td>';
                        echo '<td>',$row['price'],'</td>';
                        echo '<td>',$row['outline'],'</td>';
                        echo '<td>',$row['stock'],'</td>';
                        echo '<td>',$row['sales'],'</td>';
                        echo "\n";
                    }
                ?>
            </table>
            <form action="m-home.php" method="post">
                <input type="submit" value="ホームへ戻る" class="button2">
            </form>
        </div>
    </div>
</body>
</html>