<?php 
 $name = $_GET['name'];
 $url="https://free-api.heweather.com/s6/weather/forecast?location=$name&key=cb92e128f1364542bd33ab761b0509b1";
 $data = file_get_contents($url);
 $data1 = json_decode($data,true);
 $data2 = $data1['HeWeather6'][0]['daily_forecast'];
 $pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
  foreach ($data2 as $key => $value) {
  	$date = $value['date'];
  	$tmp_max=$value['tmp_max'];
  	$tmp_min=$value['tmp_min'];
  	$sql = "insert into tian (date,di,gao,city) values ('$date','$tmp_min','$tmp_max','$name')";
  	$pdo->query($sql);
  }
  $str=json_encode($data2);
  echo $str;
 ?>