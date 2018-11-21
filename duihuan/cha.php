<?php 
 $pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
 session_start();
 $user_id=$_SESSION['user_id'];
 $sql = "select * from log  inner join goods3 on log.goods_id=goods3.id where user_id=$user_id";
 $data=$pdo->query($sql)->fetchAll();
 // var_dump($data);die;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>排序</td>
			<td>商品名</td>
			<td>消耗积分</td>
			<td>兑换时间</td>
		</tr>
		<?php foreach ($data as $key => $value) { ?>
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value['goods_name']?></td>
				<td><?=$value['goods_fen']?></td>
				<td><?=date('Y-m-d',$value['addtime'])?></td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>