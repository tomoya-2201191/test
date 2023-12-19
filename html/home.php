<?php session_start();?>
<?php
    const SERVER = 'mysql219.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-asoclothes';
    const USER = 'LAA1516821';
    const PASS = 'Pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>ASO CLOTHES</title>
  <style>
    .flex{
    display: flex;
    
    }
    .flex>p{
        width: 25%;
    }
    .main{
      text-align: center;
    }
    #column ul {
	width: calc(100 + 20px);
	margin: 0 -10px;
	display: flex;
	flex-wrap: wrap;
}

#column li {
	padding: 10px 10px 20px 30px;
  list-style: none;
    width: 250px;
    overflow: hidden;
    float:left;
    height:400px;
}

#column li a,
#column li a:visited {
	text-decoration: none;
	color: #111;
}

#column li p {
	font-size: 130%;
	margin-bottom: 3px;
}

#column li span {
	font-size: 110%;
	display: block;
}
.column04 li {
	width: calc(25% - 20px);
}
#column img {
  border-radius: 10px;
}
.soldout {
    font-size: 25px;
    font-weight: bold;
  
  
  }

    
  </style>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img src="../img/header.JPG">
        </a>
        <div class="login">
        <?php
            if(isset($_SESSION['customer'])){
              echo '<a href="logout.php">ログアウト</a>';
            }else{
              echo '<a href="login.php">ログイン</a>';
            }
          ?>
        </div>
    </header>
    <div class="shopping-cart">
    <a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
    </div>

    <div class="name">
            <u><p>ホーム</p></u>
    </div>
    <?php require 'header.php'; ?>

        <div class="main">
          <?php
            echo '<div id="column" class="column03">';
            echo '<ul>';
            $pdo= new PDO($connect,USER,PASS);
            $sql=$pdo->query('select * from product');            
            foreach ($sql as $row) {
              $id=$row['id'];
              echo '<li><a href="detail.php?id=', $id, '"><img alt="image" src="../img/', $row['jpg'], '.jpg" height="240" width="260">';
              if($row['stock']==0){
                echo '<a class=soldout><font color=red>SOLD OUT</font></a>';
              }
              echo '<h3><a href="detail.php?id=', $id, '">', $row['name'], '</a></h3>';
              echo '<span><h4>¥', $row['price'],'</span><span>','size:',$row['size'], '</h4></span></li>';
          }
          echo '</ul>';
          echo '</div>';
          ?>
        </div>
        
        <script>
          function func1(e) {
            e.classList.toggle("active");
          }
        </script>
</body>
</html>
