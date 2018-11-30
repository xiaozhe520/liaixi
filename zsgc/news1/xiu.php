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
 	<form action="<?= Url::to(['news1/xiu_do'])?>" method="post">
 	<input type="hidden" name="_csrf-frontend" value="<?=yii::$app->request->csrfToken;?>">
 	<input type="hidden" name="id" value="<?=$data['id']?>">
    <input type="text" name="name" class="form-control" value="<?=$data['name']?>">
    <input type="submit" value="修改" class="btn btn-default">
 	</form>
 </body>
 </html>