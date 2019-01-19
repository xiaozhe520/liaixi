<?php 
use yii\widgets\LinkPager;
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
 		<td>照片</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach ($data as $key => $v) { ?>
 		<tr>
 			<td><?php echo $key+1; ?></td>
 			<td> <img src="<?php echo $v['imageFile']; ?>" alt=""> </td>
 			<td> <a href="<?php echo Url::to(['img/del', 'id' => $v['id']]);;?>">删除</a> </td>
 		</tr>
   <?php } ?>

   </table>
   <?php 
    echo LinkPager::widget([
    'pagination' => $pagination,
    'lastPageLabel' =>'尾页',
    'firstPageLabel' =>'首页',
    ]);
    ?>
 </body>
 </html>
