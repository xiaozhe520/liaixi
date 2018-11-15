<?php 
 $username=$_POST['username'];
 $pwd = $_POST['pwd'];
 $phone = $_POST['phone'];
 $code = $_POST['code'];
 $redis = new Redis;
 $redis->connect('127.0.0.1',6379);
 $code2=$redis->get('code');
 if ($code2==$code) {
 	$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
 	$res = "insert into `duan` (`username`,`pwd`,`phone`) values ('$username','$pwd','$phone')";
 	$pdo->query($res);
 	
 }else{
 	echo "<script>alert('验证码错误');location.href='duan.html';</script>";

 }

