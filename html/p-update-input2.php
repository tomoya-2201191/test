<?php require 'dbconnect.php'; ?>
<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    session_start();
    $pdo = new PDO($connect,USER,PASS);
        if(isset($_POST['insert'])) {
            $login_success_url="";
            $error_message = "";
            $name = $_POST['name'];
            $category = $_POST['category'];
            $size = $_POST['size'];
            $price = $_POST['price'];
            $outline = $_POST['outline'];
            $stock = $_POST['stock'];
            $jpg = $_POST['jpg'];
           
            $sql = $pdo->prepare('update product set name=?,category=?,size=?,price=?,outline=?,stock=? where id=?');
                if(empty($name)){
                    $error_message = '商品名を入力してください';
                }else if(empty($category)){
                    $error_message = 'カテゴリを入力してください';
                }else if(empty($size)){
                    $error_message = 'サイズを入力してください';
                }else if(!preg_match('/^[0-9]+$/',$price)){
                    $error_message = '価格を整数で入力してください';
                }else if(empty($outline)){
                    $error_message = '概要を入力してください';
                }else if(!preg_match('/^[0-9]+$/',$stock)){
                    $error_message = '在庫数を整数で入力してください';
                }else if(empty($jpg)){
                    $error_message = '画像パスを入力してください';
                }else{
                    $sql->execute([$name,$category,$size,$price,$outline,$stock,$jpg]);
                    $login_success_url = "p-update-output.php";
                    header("Location: {$login_success_url}");
                    exit;
                }
            }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>更新</title>
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
            <table>
                <tr><th>商品ID</th><th>商品名</th><th>カテゴリ</th><th>サイズ</th><th>価格</th><th>概要</th><th>在庫数</th></tr>
                <?php
                    $pdo=new PDO($connect, USER, PASS);
                    $sql=$pdo->prepare('select * from product where id=?');
                    $sql->execute([$_POST['id']]);
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<form action="p-update-output.php" method="post">';
                        echo '<td>';
                        echo '<input type="hidden" name="id" value="', $row['id'], '">';
                        echo $row['id'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="name" value="', $row['name'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="category" value="', $row['category'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="size" value="', $row['size'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="text" name="price" value="', $row['price'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<textarea name="outline">';
                        echo $row['outline'];
                        echo '</textarea>';
                        echo '</td> ';
                        echo '<td>';
                        echo ' <input type="text" name="stock" value="', $row['stock'], '">';
                        echo '</td> ';
                        echo '<td><input type="submit" value="更新" class="button"></td>';
                        echo '</form>';
                        echo '</tr>';
                        echo "\n";
                    }
                ?>
            </table>
            <form action="p-update-input.php" method="post">
                <input type="submit" value="選択画面へ戻る" class="button2">
            </form>
            <div class="error">
            <?php
                    if(!empty($error_message)){
                        echo $error_message;
                    }
            ?>
            </div>
            
        </div>
    </div>
</body>
</html>