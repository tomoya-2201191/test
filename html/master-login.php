<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    session_start();
    $pdo = new PDO($connect,USER,PASS);
        if(isset($_POST["login"])) {
            $error_message = "";
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            
            $sql = $pdo->prepare('select * from master where mail_adress=?');
            $sql->execute([$mail]);
            $row = $sql->fetch();

                if(empty($mail) || empty($pass)){
                    $error_message = "※未入力の項目があります";
                }else if($mail !== $row['mail_adress'] || $pass !== $row['pass']) {
                    $error_message = "※メールアドレスかパスワードが違います";
                }else if($mail == $row['mail_adress'] && $pass == $row['pass']){
                    $login_success_url = "m-home.php";
                    header("Location: {$login_success_url}");
                    exit;
                }
            }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="../css/frame.css">
    <style>
        .mail{
            text-align: center;
        }
        .pass{
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        .txt{
           width: 400px;
           height: 50px; 
           text-align: center;
        }
        .txt::placeholder {
            text-align: center;
            font-size: 20px;
        }
        .form-row {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #f2f4f5;
        }
        .form-row:last-child {
            border-bottom: none;
        }
        .form-label {
            display: flex;
            align-items: center;
            width: 250px;
        }
        .form-label label {
            font-weight: bold;
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
        .b1{
            width: auto;
            height: 70px;
            margin-left: 40px;
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
        </header>
        <br>
        <form action="master-login.php" method="post">
        <form action="login.php" method="post">
            <div class="form-row">
                <div class="form-label">
                    <label for="mail">メールアドレス：</label>
                </div>
                <input type="text" class="txt" name="mail" placeholder="例) abcd@xyz.com">
            </div>
            <div class="form-row">
                <div class="form-label">
                    <label for="pass">パスワード：</label>
                </div>
                <input type="password" class="txt" name="password">
            </div>
            <br>
            <div class="login">
                <input type="submit" name="login" class="b1" value="ログイン">
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