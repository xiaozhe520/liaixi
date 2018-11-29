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
    <form action='<?=Url::to(['ce/xiu_do'])?>' method="post">
    <input type="hidden" name="_csrf-frontend" value="<?=yii::$app->request->csrfToken;?>">
    <input type="hidden" name="id" value='<?php echo $data['id'] ?>'>
 	<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>">
 	<input type="submit" class="btn btn-default" value="xiugai">
 	</form>
 </body>
 </html>