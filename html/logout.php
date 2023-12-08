<?php
session_start();

const SERVER = 'mysql219.phy.lolipop.lan';
const DBNAME = 'LAA1516821-asoclothes';
const USER = 'LAA1516821';
const PASS = 'Pass0726';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>ログアウト</title>
    <style>
        .parent ul {
            display: none;
        }

        .active ul {
            display: block;
        }

        .flex {
            display: flex;
        }

        .flex>p {
            width: 25%;
        }

        .main {
            text-align: center;
        }

        a {
            text-decoration: none;
        }
        .b1{
            width: auto;
            height: 70px;
            padding: 10px;
            background-color: rgb(20, 230, 146);
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
        <a href="login.php">ログイン</a>
    </div>
</header>
<div class="shopping-cart">
    <a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
    </div>
<div class="name">
<u><p>ログアウト</p></u>
</div>
<div class="container">
    <div class="left-menu">
        <ul>
            <li><a href="home.php">ホーム</a></li>
            <li class="parent" onclick="func1(this)">ランキング
                <ul>
                    <li><a href="ranking.php?category=アウター">アウター</a></li>
                    <li><a href="ranking.php?category=トップス">トップス</a></li>
                    <li><a href="ranking.php?category=ボトムス">ボトムス</a></li>
                    <li><a href="ranking.php?category=インナー">インナー</a></li>
                    <li><a href="ranking.php?category=小物">小物</a></li>
                </ul>
            </li>
            <li><a href="userInUp-input.php">ユーザー情報更新</a></li>
            <li><a href="productSearch.php">商品検索</a></li>
        </ul>
    </div>
    <div class="main">
        <?php
        // ヘッダーの変更前にsession_destroy()を呼び出す
        session_destroy();
        echo '<br><br><br><br><br>';
        echo '<div id="message">';
        echo '<h3>ログアウトしました</h3>';
        echo '</div>';
        echo '<button type="button" class="b1" onclick="location.href=\'home.php\'">','ホームへ戻る</button>';
        exit();
        ?>
    </div>

    <script>
        function func1(e) {
            e.classList.toggle("active");
        }
    </script>
</body>
</html>
