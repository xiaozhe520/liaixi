<?php 
 $pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
 session_start();
 $user_id=$_SESSION['user_id'];
 $sql = "select * from user3";
 $data = $pdo->query($sql)->fetch();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<h2>您的积分为:<?php echo $data['user_fen']; ?></h2>
 	<hr>
 	<a href="huan.php">换购商品</a>
 	<a href="cha.php">查看已换购商品</a>
 </body>
 </html>