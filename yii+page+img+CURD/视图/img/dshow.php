<?php 
use yii\widgets\LinkPager;
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
 			<td>导航名</td>
 			<td>操作</td>
 		</tr>
 		<?php foreach ($data as $k => $v) { ?>
 		   <tr>
 		   	<td><?php echo $k+1; ?></td>
 		   	<td><?php echo $v['hang']; ?></td>
 		   	<td>
 		   	<a href="?r=img/ddel&id=<?php echo $v['id']; ?>">删除</a> 
            <a href="?r=img/dxiu&id=<?php echo $v['id']; ?>">修改</a>  
 		   	</td>
 		   </tr>
 		<?php  } ?>
 	</table>

 <?php  
	echo LinkPager::widget([
	    'pagination' => $pagination,
	]);
	?>
 </body>
 </html>
