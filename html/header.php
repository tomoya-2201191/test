<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <title>ASOCLOTHES</title>
</head>
  <style>
    .parent ul{
      display: none;
    }
    .active ul {
      display: block;
    }
    a {
      text-decoration:none;
    }
    .b1{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: rgb(255, 192, 4);
      font-size: 25px;
      border-radius:5px;
    }
    #b1{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: rgb(255, 192, 4);
      font-size: 25px;
      border-radius:5px;
    }
    .b2{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: gley;
      font-size: 25px;
      border-radius:5px;
    }
    .b3{
      width: auto;
      height: 70px;
      padding: 10px;
      background-color: rgb(20, 230, 146);
      font-size: 25px;
      border-radius:5px;
    }
    .B1{
            width: 100px;
            height: 70px;
            margin-left: 100px;
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
       
    <div class="container">
        <div class="left-menu">
            <ul>
                <li><a href="home.php">ホーム</a></li>
                <li class="parent" onclick="func1(this)">ランキング
                    <ul>
                      <li><a href="ranking.php?category=アウター">アウター</a></li>
                      <li><a href="ranking.php?category=トップス">トップス</a></li>
                      <li><a href="ranking.php?category=ボトムス">ボトムス</a></li>
                      <li><a href="ranking.php?category=シューズ">シューズ</a></li>
                      <li><a href="ranking.php?category=小物">小物</a></li>
                    </ul>
                  </li>
                <li><a href="userInUp-input.php">ユーザー情報更新</a></li>
                <li><a href="productSearch.php">商品検索</a></li>
            </ul>
        </div>
        <div class="main">
          
    
  
  <script>
    function func1(e) {
      e.classList.toggle("active");
    }
  </script>
