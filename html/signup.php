
<?php
            if (isset($_POST['register'])) {
                // エラーメッセージを格納する変数
                $error_message = '';
            
                // 入力値を取得
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $mail = $_POST['mail'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $confirmpass = $_POST['confirmpass'];
            
                //必須項目チェック
                if (empty($name) || empty($phone) || empty($mail) || empty($pass) || empty($address) || empty($confirmpass)) {
                    $error_message = '全ての項目を入力してください。';
                }else{
                        $login_success_url = "home.php";
                        header("Location: {$login_success_url}");
                        exit;
                }
            
                
            
                // エラーメッセージがある場合は表示
                /*if (!empty($error_message)) {
                    echo '<script>document.getElementById("error-message").textContent = "' . $error_message . '";</script>';
                } else {
                    // バリデーションが成功した場合、ここで登録処理を実行
                    // データベースにユーザーを登録するなどの処理を実行
                }*/
            }
            ?>
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
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
    </header>
            <h1>新規登録</h1>
            <form action="signup.php">
                <div class="top">
                    <input type="text" class="txt" name="name" placeholder="名前">
                    <input type="text" class="txt" name="phone" placeholder="電話番号">
                </div>
                <div class="middle">
                    <input type="text" class="txt" name="mail" placeholder="メールアドレス">
                    <input type="password" class="txt" name="pass" placeholder="パスワード">
                </div>
                <div class="under">
                    <input type="text" class="txt" name="address" placeholder="住所">
                    <input type="password" class="txt" name="confirmpass" placeholder="パスワード再入力">
                </div>
                <br>
                <div class="btn">
                    <button type="button" class="B1" onclick="location.href='login.php'">戻る</button>
                    <input type="submit" class="B2"name="register" value="登録">
                </div>
            </form>
            <div class="error">
                <?php
                    if(!empty($error_message)){
                        echo $error_message;
                    }
                ?>
            </div>
            </body>
            </html>
            
</body>
</html>