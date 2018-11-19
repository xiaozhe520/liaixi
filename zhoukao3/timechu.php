<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$sql = "select * from goods";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//处理时间
foreach ($data as $key => $value) {
	$starttime=time();//开始时间
	$endtime = $value['endtime'];//结束时间
	$chatime = $endtime-$starttime;//差的时间
	$hour = floor($chatime/3600);//小时
    $fen = floor(($chatime-$hour*3600)/60);//分钟
    $miao = $chatime-$hour*3600-$fen*60;//秒

    $data[$key]['hour']=$hour;
    $data[$key]['fen']=$fen;
    $data[$key]['miao']=$miao;
}
    echo json_encode($data);