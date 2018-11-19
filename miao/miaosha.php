<?php 
$id = $_GET["id"];
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$redis =new Redis;
$redis->connect("127.0.0.1",6379);
//给一个键
$key ='goods'.$id;
// 过来一个请求，则判断一下redis list中是否还有元素（队列长度是否大于0），如果有元素，则退队一个元素，同时库存减1
if ($redis->llen($key)>0) {
   $redis->lpop($key);
   $sql = "update goods set stock=stock-1 where id=$id";
   //订单入库
   $order_id = date('Ymd',time()).md5(rand(100,999));
   $addtime = time();
   $res="insert into `order` (`order_id`,`goods_id`,`addtime`) values('$order_id','$id','$addtime')";
   if ($data = $pdo->exec($sql)) {
     $pdo->query($res);
     echo json_encode(['code'=>1,'msg'=>'秒杀成功!']);
   }
}else{
    echo json_encode(['code'=>1,'msg'=>'秒杀失败!']);
}


 ?>