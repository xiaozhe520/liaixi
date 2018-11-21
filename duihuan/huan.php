<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$sql = "select * from goods3";
$data =$pdo->query($sql)->fetchAll();
//判断积分
 session_start();
 $user_id=$_SESSION['user_id'];
 $sql1 = "select * from user3";
 $data1 = $pdo->query($sql1)->fetch(); 
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php foreach ($data as $key => $value) { ?>
 		<img src="<?php echo $value['img']; ?>" alt=""><br>
 		<p>积分：<?php echo $value['goods_fen'];?> 数量：<?php echo $value['goods_shu']; ?></p><br>
 		<p><a href="JavaScript:void(0)" onclick="fun(<?=$value['id']?>,<?=$value['goods_fen']?>)">兑换</a></p>
 	<?php } ?>
 </body>
 </html>
<script src="jquery.js"></script>
<script>
function fun(goods_id,goods_fen){
 var user_fen="<?php echo $data1['user_fen'] ?>";
 if (user_fen>goods_fen) {
     alert("您确定兑换嘛？该积分为:"+goods_fen);  
     $.ajax({
     	url:'huan_do.php?goods_id='+goods_id+'&goods_fen='+goods_fen,
     	type:'get',
     	dataType:'text',
     	success:function(data){
             if (data=='ok') {
               alert('兑换成功');
             }else{
              alert('兑换失败');
             }
     	}
     })
 }else{
 	alert("您的积分不足不能兑换");
 }
}
</script>