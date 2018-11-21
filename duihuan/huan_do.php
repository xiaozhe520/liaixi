<?php 
  $pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
  $goods_id = $_GET['goods_id'];
  $goods_fen=$_GET['goods_fen'];
  session_start();
  $id = $_SESSION['user_id'];
  //修改商品表
  $sql = "update goods3 set goods_shu=goods_shu-1 where id='$goods_id'";
  $pdo->exec($sql);
  //修改用户表
  $sql1="update user3 set user_fen=user_fen-$goods_fen where id='$id'";
  $pdo->exec($sql1);
  //增加记录表
  $addtime = time();
  $sql2="insert into log (`goods_id`,`user_id`,`goods_fen`,`addtime`) values('$goods_id','$id','$goods_fen','$addtime')";
  $pdo->query($sql2);
  echo "ok";
 ?>