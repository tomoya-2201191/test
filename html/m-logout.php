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
    <title>m-logout</title>
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
            background-color:#ffff;
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
</header>

<div class="container">
    
    <div class="main">
        <?php
        // ヘッダーの変更前にsession_destroy()を呼び出す
        session_destroy();
        echo '<br><br><br><br><br>';
        echo '<div id="message">';
        echo '<h3>ログアウトしました</h3>';
        echo '</div>';
        echo '<button type="button" class="b1" onclick="location.href=\'master-login.php\'">','ログイン画面に戻る</button>';
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
