<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<?php 
    session_start();
    $error_message = "";
    $pdo = new PDO($connect,USER,PASS);
        if(isset($_POST["login"])) {
            $mail = $_POST['mail'];
            $pass = $_POST['password'];

            $sql = $pdo->prepare('select * from customer where mail_adress=?');
            $sql->execute([$mail]);
            foreach($sql as $row){
                if($mail == $row['mail_adress'] && $pass == $row['pass']) {
                    $login_success_url = "home.php";
                    header("Location: {$login_success_url}");
                    exit;
                }
            }
        $error_message = "※メールアドレスもしくはパスワードが間違っています。<br>もう一度入力して下さい。";
        }     
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
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
        .login{
            text-align: center;
        }
        .top{
            text-align: center;
        }
        .new{
            text-align: center;
        }
        .error{
            text-align: center;
            color: red;
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
        <form action="login.php" method="post">
            <div class="mail">
                <input type="text" class="txt" name="mail" placeholder="メールアドレス">
            </div>
            <div class="pass">
                <input type="password" class="txt" name="password" placeholder="パスワード">
            </div>
            <br>
            <div class="login">
                <input type="submit" name="login" value="ログイン">
            </div>
        </form>
        <br>
        <div class="top">
            <h3>管理者の方は<button type="button" onclick="location.href='master-login.php'">管理者ログイン</button></h3>
        </div>
        <div class="new">
            <h3>初めての方は<button type="button" onclick="location.href='signup.php'">新規登録</button></h3>
        </div>
        <div class="error">
            <?php
                if($error_message){
                    echo $error_message;
                }
            ?>
        </div>
</body>
</html>