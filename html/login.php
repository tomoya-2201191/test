<!DOCTYPE html>
<html lang="ja">
<head>
    <title>ログイン</title>
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
            <img src="./img/header.JPG">
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
        <br>
        <div class="top">
            <h3>管理者の方は<button type="button" >管理者ログイン</button></h3>
        </div>
        <div class="new">
            <h3>初めての方は<button type="button" onclick="location.href='signup.php'">新規登録</button></h3>
        </div>
        
</body>
</html>