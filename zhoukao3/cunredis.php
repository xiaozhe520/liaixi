<?php 
$redis = new Redis;
$redis->connect("127.0.0.1",6379);
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$sql = "select * from goods";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
	for ($i=1; $i <= $value['stock'] ; $i++) { 
		$redis->lpush("goods".$value['id'],$i);
	}
}
 ?>