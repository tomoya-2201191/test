<!DOCTYPE html>
<html lang="ja">
<head>
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="../css/frame.css">
    <style>
        .title{
            text-align: center;
        }
        .mail{
            text-align: center;
        }
        .pass{
            text-align: center;
        }
        .txt{
           width: 400px;
           height: 50px; 
        }
        .txt::placeholder {
            text-align: center;
            font-size: 20px;
        }
        .log{
            text-align: center;
        }
        .top{
            text-align: center;
        }
        .new{
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
    </header>
    <br>
    <div class="title">
        <h1>管理者ログイン</h1>
    </div>    
    <div class="mail">
        <input type="text" class="txt" placeholder="メールアドレス">
    </div>
    <div class="pass">
        <input type="password" class="txt" placeholder="パスワード">
    </div>
    <br>
    <div class="log">
        <form action="m-home.php" method="post">
            <input type="button" onclick="location.href='m-home.php'" value="ログイン">
        </form>
    </div>
</body>
</html>