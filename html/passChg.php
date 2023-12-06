<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>パスワード変更</title>
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
            <a href="login.php">ログイン</a>
            
        </div>
    </header>
        <div class="shopping-cart">
            <a href="cart-show.php">買い物カゴ</a>
        </div>
    <div class="name">
            <u><p>パスワード変更</p></u>
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
        <form class="forms-sample">
                      <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-sm-3 col-form-label">旧パスワード入力</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">新パスワード入力</label>
                          <input type="password" class="form-control" id="exampleInputPassword2">
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputAddress" class="col-sm-3 col-form-label">パスワード再入力</label>
                          <input type="text" class="form-control" id="exampleInputMobile">
                      </div>
                      <p></p>
                      <button type="submit">変更</button>
                      
                    </form>
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
</body>
</html>