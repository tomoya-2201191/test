<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>削除完了</title>
</head>
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
        <u><p>更新</p></u>
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
                $sql=$pdo->prepare('delete from product where id=?');
                if($sql->execute([$_POST['id']])){
                    echo '削除に成功しました。';
                }else{
                    echo '削除に失敗しました。';
                }
            ?>
            <br><hr><br>
            <table>
                <tr><th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>サイズ</th><th>価格</th><th>概要</th><th>在庫数</th><th>売上数</th></tr>
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