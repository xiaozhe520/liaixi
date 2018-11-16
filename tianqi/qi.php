<?php 
$city = $_GET['city'];
$redis = new Redis;
$redis->connect('127.0.0.1',6379);
if ($redis->exists($city)) {
	$str = $redis->get($city);
	// echo "from redis";
	echo $str;
}else{
$key = "cb92e128f1364542bd33ab761b0509b1";
$url = "https://free-api.heweather.com/s6/weather/forecast?location=$city&key=$key";

// 创建一个新cURL资源
$ch = curl_init();
// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
// 抓取URL并把它传递给浏览器
$str=curl_exec($ch);
// 关闭cURL资源，并且释放系统资源
curl_close($ch);
$data = json_decode($str,true);
$data = $data['HeWeather6'][0]['daily_forecast'];
$pdo =new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
// print_r($data);
foreach ($data as $key => $value) {
	$date=$value['date'];
	$gao=$value['tmp_max'];
	$di=$value['tmp_min'];
	$sql = "insert into tian (date,di,gao,city) values ('$date','$di','$gao','$city')";
	$pdo->query($sql);
}
//天气存redis
$str = json_encode($data);
$redis->set($city,$str);
// echo "from db";
echo $str;
}

 ?>