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
 			<td>标题</td>
 			<td>内容</td>
 			<td>时间</td>
 			<td>操作</td>
 		</tr>
 		<?php foreach ($data as $key => $value) { ?>
 		   <tr>
 		   	<td><?=$key+1?></td>
 		   	<td><?=$value['name']?></td>
 		   	<td><?=$value['rong']?></td>
 		   	<td><?=date('Y-m-d',$value['addtime'])?></td>
 		   	<td><a href="<?= Url::to(['news1/xiu','id' => $value['id']])?>" class="glyphicon glyphicon-pencil"></a> <a href="<?=Url::to(['news1/shan','id' => $value['id']])?>" class="glyphicon glyphicon-remove"></a></td>
 		   </tr>
 		<?php } ?>
 	</table>
 </body>
 </html>