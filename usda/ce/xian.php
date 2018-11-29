<?php 
use yii\helpers\Url;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 <table class="table">
  <tr>
  	<td>序号</td>
  	<td>名</td>
  	<td>邮箱</td>
  	<td>时间</td>
  	<td>处理</td>
  </tr>
  <?php foreach ($data as $key => $value) { ?>
  <tr>
  	<td><?php echo $key+1; ?></td>
  	<td><?php echo $value['name']; ?></td>
  	<td><?php echo $value['email']; ?></td>
  	<td><?php echo date('Y-m-d',$value['addtime']); ?></td>
  	<td><a href='<?=Url::to(['ce/xiu','id'=>$value['id']])?>'>修改</a> | <a href="<?=Url::to(['ce/shan','id'=>$value['id']])?>">删除</a>
  </tr>
  <?php } ?>
</table>
 </body>
 </html>