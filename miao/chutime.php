<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$res = "select * from goods";
$data = $pdo->query($res)->fetchAll(PDO::FETCH_ASSOC);

//计算倒计时
foreach ($data as $key => $value) {
	$starttime=time();
	$endtime = $value['endtime'];
	$chatime = $endtime-$starttime; //时间差
	$hour = floor($chatime/3600); //小时
	$minute = floor(($chatime-$hour*3600)/60); //分钟
	$miao = $chatime-$hour*3600-$minute*60; //秒
    
    //存
    $data[$key]['hour'] = $hour;
    $data[$key]['minute'] = $minute;
    $data[$key]['miao'] = $miao;
}
echo json_encode($data);