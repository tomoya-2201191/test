<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>更新完了</title>
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
    table{
        table-layout:fixed;
        width:100%;
    }
    .box{
    position:relative;
}
.button2{
    min-width: 200px; 
    height: 70px;
    margin-bottom: 20px;
    background-color: rgb(20, 230, 146);
    font-size: 25px;
    border-radius:5px;
    padding: 0 16px; /* テキスト横の余白がキツキツにならないように */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position:absolute;
    left:10px;
}
.button02{
    min-width: 200px; 
    height: 70px;
    margin-bottom: 20px;
    background-color: rgb(20, 209, 230);
    font-size: 25px;
    border-radius:5px;
    padding: 0 16px; /* テキスト横の余白がキツキツにならないように */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position:absolute;
    right:10px;
}
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
            <a href="m-logout.php">ログアウト</a>
            
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
                $sql=$pdo->prepare('update product set name=?,category=?,size=?,price=?,outline=?,stock=? where id=?');
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
                }else if(strlen($_POST['name']) > 100){
                    echo '商品名の文字数を100文字以内で入力してください';
                }else if(strlen($_POST['outline']) > 500){
                    echo '概要の文字数を500文字以内で入力してください';
                }else if(strlen($_POST['price']) > 6){
                    echo '価格6桁以内で入力してください';
                }else if(strlen($_POST['stock']) > 3){
                    echo '在庫6桁以内で入力してください';
                }else if($sql->execute([$_POST['name'],$_POST['category'],$_POST['size'],$_POST['price'],$_POST['outline'],$_POST['stock'],$_POST['id']])){
                    echo '更新が完了しました';
                }else{
                    echo '更新に失敗しました';
                }
            ?>
            <br><hr><br>
            <table>
                <tr><th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>サイズ</th><th>価格</th><th>概要</th><th>在庫数</th><th>売上数</th></tr>
                <tr></tr>
                <?php
                     $pdo=new PDO($connect, USER, PASS);
                        $sql=$pdo->prepare('select * from product where id=?');
                        $sql->execute([$_POST['id']]);
                        foreach ($sql as $row) {
                            echo '<tr>';
                            echo '<td style="text-align:center;">',$row['id'],'</td>';
                            echo '<td style="text-align:center;">',$row['name'],'</td>';
                            echo '<td style="text-align:center;">',$row['category'],'</td>';
                            echo '<td style="text-align:center;">',$row['size'],'</td>';
                            echo '<td style="text-align:center;">',$row['price'],'</td>';
                            echo '<td style="text-align:center;">',$row['outline'],'</td>';
                            echo '<td style="text-align:center;">',$row['stock'],'</td>';
                            echo '<td style="text-align:center;">',$row['sales'],'</td>';
                            echo "\n";
                        }
                ?>
            </table>
            <div class="box">
            <form action="m-home.php" method="post">
                <input type="submit" value="ホームへ戻る" class="button02">
            </form>
            <?php
            $id = $_POST['id'];
            echo '<form action="p-update-input2.php" method="post">';
            echo '<input type="submit" value="戻る" class="button2">';
            echo '<input type="hidden" name="id" value="',$id, '">';
            echo '</form>';
            ?>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>
