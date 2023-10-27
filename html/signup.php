<!DOCTYPE html>
<html lang="ja">
<head>
    <title>新規登録</title>
    <link rel="stylesheet" href="../css/frame.css">
</head>
<style>
    h1{
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
    .top{
        text-align: center;
    }
    .middle{
        text-align: center;
    }
    .under{
        text-align: center;
    }
    .btn{
        text-align: center;
    }
    .B1{
        margin-right: 400px;
    }
</style>
<body>
    <header class="header">
        <a href="home.html">
            <img src="../img/header.JPG">
        </a>
    </header>
            <h1>新規登録</h1>
            <div class="top">
                <input type="text" class="txt" placeholder="名前">
                <input type="text" class="txt" placeholder="電話番号">
            </div>
            <div class="middle">
                <input type="text" class="txt" placeholder="メールアドレス">
                <input type="password" class="txt" placeholder="パスワード">
            </div>
            <div class="under">
                <input type="text" class="txt" placeholder="住所">
                <input type="password" class="txt" placeholder="パスワード再入力">
            </div>
            <br>
            <div class="btn">
                <button type="button" class="B1">戻る</button>
                <button type="button" class="B2">登録</button>
            </div>
</body>
</html>