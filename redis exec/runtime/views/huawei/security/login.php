<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>员工注册</title>
</head>
<body>
	<h3>员工信息录入</h3>
	<form action="<?php echo IUrl::creatUrl("security/yong_ok");?>" method="post" onsubmit="return fun()">
		用户名：<input type="text" name="name" id="name"><br>
		密 码：<input type="password" name="pwd" id="pwd"><br>
		确认密码：<input type="password" name="pwd1" id="pwd1"><br>
		真实姓名：<input type="text" name="zhen"><br>
		<!-- 工资在这都验证了 -->
		工资：<input type="number" name="gong"><br>
		<input type="submit" value="注册">
	</form>
</body>
</html>
<script>
     //正则验证
	function fun(){
     var name = document.getElementById('name').value;
     var pwd = document.getElementById('pwd').value;
     var pwd1 = document.getElementById('pwd1').value;
     if (name=='' || name.length==0) {
     	alert("用户名不正确！！！");
     	return false;
     }
     if (pwd!=pwd1) {
     	alert("密码不一致！！！");
     	return false;
     }
     return true;
	}
</script>
