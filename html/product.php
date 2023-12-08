<?php require 'dbconnect.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/frame.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>商品検索</title>
    <style>
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
    </style>
</head>
<body>
<div class="home">
<div class="shopping-cart">
<a class="fas fa-cart-plus fa-3x" href="cart-show.php"></a>
</div>
    <div class="name">
            <u><p>商品検索</p></u>
    </div>
</div>
    <?php require 'header.php'; ?>

        <div class="main">
        <form action="product.php" method="post">
        <input type="text" class="text" name="keyword" placeholder="商品名">
        <input type="submit" class="button" value="検索">
        </form>
        </div>
        <?php
        echo '<div id="column" class="column03">';
        echo '<ul>';
    $pdo=new PDO($connect, USER, PASS);
    if (isset($_POST['keyword'])) {
        $sql=$pdo->prepare('select * from product where name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
        $count=$sql -> rowCount();
        if($count > 0){
            foreach ($sql as $row) {
                $id=$row['id'];
                echo '<li><a href="detail.php?id=', $id, '"><img alt="image" src="../img/', $row['jpg'], '.jpg" height="240" width="260">';
            echo '<h3><a href="detail.php?id=', $id, '">', $row['name'], '</a></h3>';
            echo '<span><h4>¥', $row['price'],'</span><span>','size:',$row['size'], '</h4></span></li>';
            }
            echo '</ul>';
            echo '</div>';
        }else{
            echo '<h2>データが1件もありません</h2>';
        }
    }
    ?>
</body>
</html>