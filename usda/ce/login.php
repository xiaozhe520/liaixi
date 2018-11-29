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
 <form action='<?=Url::to(['ce/login_chu'])?>' method='post'>
    <!-- 必须要加 -->
  <input type="hidden" name="_csrf-frontend" value="<?=yii::$app->request->csrfToken;?>">
  <div class="form-group">
    <label>姓名</label>
    <input type="text" class="form-control" name="name"  placeholder="name">
  </div>
  <div class="form-group">
    <label>密码</label>
    <input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label>邮箱</label>
    <input type="email" class="form-control" name="eamil" id="exampleInputEmail1" placeholder="Email">
  </div>
 
  <button type="submit" class="btn btn-default">提交</button>
</form>
</body>
</html>