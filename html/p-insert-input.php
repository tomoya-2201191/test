<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';
 
    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
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
           
            $sql = $pdo->prepare('insert into product(name,category,size,price,outline,stock,jpg) value (?,?,?,?,?,?,?)');
                if(empty($name)){
                    $error_message = '商品名を入力してください';
                // }else if(empty($category)){
                //     $error_message = 'カテゴリを入力してください';
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
                }else if(strlen($_POST['name']) > 100){
                    $error_message = '商品名の文字数を100文字以内で入力してください';
                }else if(strlen($_POST['outline']) > 500){
                    $error_message = '概要の文字数を500文字以内で入力してください';
                }else if(strlen($_POST['price']) > 6){
                    $error_message = '価格を6桁以内で入力してください';
                }else if(strlen($_POST['stock']) > 3){
                    $error_message = '在庫を3桁以内で入力してください';
                }else{
                    $sql->execute([$name,$category,$size,$price,$outline,$stock,$jpg]);
                    $login_success_url = "p-insert-output.php";
                    header("Location: {$login_success_url}");
                    exit;
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>商品登録</title>
    <style>
    .parent ul{
      display: none;
    }
    .active ul {
      display: block;
    }
    .error{
        color: red;
    }
    .main{
        font-size:20px;
    }
    .text{
        width: 50px;
        height: 20px;
    }
    .toroku{
        text-align:center;
    }
    .box select{
        width: 200px;
        height:30px;
        font-size:20px;
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

            <form action="p-insert-input.php" method="post">
                <div class="toroku">
                    商品名：<input type="text"  class="text" name="name" style="width: 300px; height=30px"><br><br>
                    <div class="box select">
                    カテゴリ：<select name= "category">
                                <option value = "アウター">アウター</option>
                                <option value = "トップス">トップス</option>
                                <option value = "ボトムス">ボトムス</option>
                                <option value = "シューズ">シューズ</option>
                                <option value = "小物">小物</option>
                            </select><br>
                    </div>
                    サイズ：<input type="text" class="text" name="size" style="width: 200px; height=30px"><br>
                    価格：<input type="text" class="text" name="price" style="width: 200px; height=30px"><br><br>
                    概要：<textarea name="outline" cols="50" rows="4"></textarea><br>
                    在庫：<input type="text" class="text" name="stock" style="width: 80px; height=30px"><br>
                    画像パス:<input type="text" class="text" name="jpg" style="width: 200px; height=30px">.jpg<br><br>
                    <input type="submit" name="insert" value="登録" class="button">
                </div>
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