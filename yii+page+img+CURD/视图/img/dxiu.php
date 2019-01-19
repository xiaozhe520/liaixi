<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <form action="?r=img/dxiu" method="post">
	 	<input type="hidden" name="id" value="<?= $data['id']?>">
	 	<input type="text" name="hang" value="<?= $data['hang']?>">
	 	<input type="submit" value="修改">
	 </form>
</body>
</html>