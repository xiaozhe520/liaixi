<?php 
 //redis存入数据
$redis = new Redis;
$redis->connect('127.0.0.1',6379);
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$res = "select * from goods";
$data = $pdo->query($res)->fetchAll(PDO::FETCH_ASSOC);
 //存入数量
 foreach ($data as $key => $value) {
     for ($i=1; $i<=$value['stock']; $i++) { 
     	$redis->lpush('goods'.$value['id'],$i);
     }
 }
 ?>