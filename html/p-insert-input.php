<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>商品登録</title>
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
            <form action="p-insert-output.php" method="post">
                商品名：<input type="text" name="name" style="width: 300px; height=30px"><br>
                カテゴリ：<input type="text" name="category" style="width: 200px; height=30px"><br>
                サイズ：<input type="text" name="size" style="width: 200px; height=30px"><br>
                価格：<input type="text" name="price" style="width: 200px; height=30px"><br>
                概要：<textarea name="outline" cols="50" rows="3"></textarea><br>
                在庫：<input type="text" name="stock" style="width: 50px; height=30px">
                <input type="submit" value="登録" class="button">
            </form>
        </div>
    </div>
</body>
</html>