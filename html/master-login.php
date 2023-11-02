<!DOCTYPE html>
<html lang="ja">
<head>
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="../css/frame.css">
    <style>
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
    <div class="mail">
        <input type="text" class="txt" placeholder="メールアドレス">
    </div>
    <div class="pass">
        <input type="password" class="txt" placeholder="パスワード">
    </div>
    <br>
    <div class="log">
        <button type="button">ログイン</button>
    </div>
</body>
</html>