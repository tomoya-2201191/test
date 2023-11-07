<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>m-home</title>
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
    <div class="name"></div>
            <u><p>管理者画面</p></u>
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
          <a class="p_name" href="p-insert-input.php">商品登録</a>
          <a class="p_category" href="p-delete-input.php">商品削除</a>
          <a class="p_price" href="p-update-input.php">更新</a>
        </div>
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>