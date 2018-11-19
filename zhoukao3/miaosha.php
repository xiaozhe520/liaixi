<?php 
 $id = $_GET['id'];
 $pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
 $redis = new Redis;
 $redis->connect("127.0.0.1",6379);
 $key = "goods".$id;
 if ($redis->llen($key)>0) {
 	$redis->lpop($key);
 	$sql = "update goods set stock=stock-1 where id=$id";
 	//存订单
 	$order_id =md5(rand(100,999));
    $addtime = time();
    $sql1 = "insert into `order`(`order_id`,`goods_id`,`addtime`) values('$order_id','$id','$addtime')";
    if ($pdo->exec($sql)) {
       $pdo->query($sql1);
       echo json_encode(['code'=>1,'msg'=>'抢购成功！！']);
    }
 }else{
 	echo json_encode(['code'=>0,'msg'=>'抢购失败！！！']);
 }
 ?>