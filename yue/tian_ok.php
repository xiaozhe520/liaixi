<?php 
$redis = new Redis;
$redis->connect('127.0.0.1',6379);
$city = $_GET['city'];
if ($redis->exists($city)) {
	$data=$redis->get($city);
    echo $data;
}else{
$pdo = new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
$key = "cb92e128f1364542bd33ab761b0509b1";
$url = "https://free-api.heweather.com/s6/weather/forecast?location=$city&key=$key";
$data = file_get_contents($url);
$str = json_decode($data,true);
// echo "<pre>";
// var_dump($str);
$data1 = $str['HeWeather6'][0]['daily_forecast'];
// echo "<pre>";
// var_dump($data1);
foreach ($data1 as $key => $value) {
	$max = $value['tmp_max'];
	$min = $value['tmp_min'];
	$date = $value['date'];
	$sql = "insert into `chart` (`date`,`max`,`min`,`city`) values ('$date','$max','$min','$city')";
	$pdo->query($sql);
}
//把data1数组转换成json顺便存到redis里面
$arr = json_encode($data1);
$redis->set($city,$arr);
echo $arr;
}
 ?>
