<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/frame.css">
    <title>home</title>
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
            <img src="./img/header.JPG">
        </a>
        <div class="login">
            <a href="#">ログイン</a>
            
        </div>
    </header>
    <div class="shopping-cart">
            <a href="cart-show.php">買い物カゴ</a>
        </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="#">ホーム</a></li>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="">アウター</a></li>
                      <li><a href="">トップス</a></li>
                      <li><a href="">ボトムス</a></li>
                      <li><a href="">インナー</a></li>
                      <li><a href="">小物</a></li>
                    </ul>
                  </li>
                <li><a href="#">ユーザー情報更新</a></li>
                <li><a href="productSearch.php">商品検索</a></li>
            </ul>
        </div>
        <div class="main">
          
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>