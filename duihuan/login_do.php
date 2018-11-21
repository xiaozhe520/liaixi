<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$sql = "select * from user3 where name='$name' and pwd='$pwd'";
 if ($data=$pdo->query($sql)->fetch()) {
 	//id存到session中
 	session_start();
    $_SESSION['user_id'] = $data['id'];
 	echo "<script>alert('登录成功');location.href='zhu.php'</script>";
 }else{
 	echo "<script>alert('账号密码错误！！！')</script>";
 }
 ?>