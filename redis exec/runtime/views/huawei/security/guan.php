<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
</head>
<body>
	<h3>管理员登录</h3>
	<form action="<?php echo IUrl::creatUrl("security/guan_ok");?>" method="post">
		用户名：<input type="text" name="name" id="name"><br>
		密 码：<input type="password" name="pwd" id="pwd"><br>
		<input type="submit" value="登录">
	</form>
</body>
</html>