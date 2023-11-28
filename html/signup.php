<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
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
                if(empty($name) || empty($phone) || empty($mail) || empty($pass) || empty($address) || empty($confirmpass)){
                    $error_message = '※未入力の項目があります';
                }else if(strlen($phone) < 10 || strlen($phone) > 12){
                    $error_message = '※電話番号を10文字以上12文字以内で収めてください';
                }else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $error_message = '※メールアドレスの形式が違います';
                }else if(strlen($pass) < 8 || strlen($pass) > 11){
                    $error_message = '※パスワードを8文字以上11文字以内に収めてください';
                }else if($pass !== $confirmpass){
                    $error_message = '※入力されているパスワードが異なっています';
                }else{
                    $login_success_url = "login.php";
                    header("Location: {$login_success_url}");
                    $pdo=new PDO($connect,USER,PASS);
                    $sql=$pdo->prepare('insert into customer(name,adress,tel,pass,mail_adress) 
                    values (?,?,?,?,?)');
                    $sql->execute([$name,$address,$phone,password_hash($pass, PASSWORD_DEFAULT),$mail]);
                    exit;
                }
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
        margin-right: 170px;
        width: 100px;
        height: 70px;
        margin-left: 40px;
        padding: 10px;
        background-color: gley;
        font-size: 25px;
        border-radius:5px;
    }
    .error{
        text-align: center;
        color: red;
    }
    .B2{
            width: 100px;
            height: 70px;
            margin-left: 150px;
            padding: 10px;
            background-color: rgb(255, 192, 4);
            font-size: 25px;
            border-radius:5px;
        }
</style>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
    </header>
            <h1>新規登録</h1>
            <form action="signup.php" method="post">
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