<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="<?php echo IUrl::creatUrl("/security/chu");?>" method="post">
	<input type="submit" value="导出">
</form>
<form action="<?php echo IUrl::creatUrl("/security/ru");?>" method="post">
	<input type="submit" value="导入">
</form>
<form action="<?php echo IUrl::creatUrl("/security/xian");?>" method="post">
 <input type="text" name="gname"><input type="submit" value="搜索">
	<table border="1">
		<tr>
			<td>序号</td>
			<td>用户名</td>
			<td>真实姓名</td>
			<td>工资</td>
		</tr>
		<?php foreach($items=$data as $key => $value){?>
		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo isset($value['name'])?$value['name']:"";?></td>
			<td><?php echo isset($value['zhen'])?$value['zhen']:"";?></td>
			<td><?php echo isset($value['gong'])?$value['gong']:"";?></td>
		</tr>
		<?php }?>
	</table>
</form>
</body>
</html>