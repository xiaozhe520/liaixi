<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$res = "select * from goods";
$data = $pdo->query($res)->fetchAll(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="jquery.js"></script>
</head>
<body>
	<?php foreach ($data as $key => $value) { ?>
    <div style="float:left">
    <p>
      <span id="h<?=$value['id']?>"></span> 时
      <span id="f<?=$value['id']?>"></span> 分
      <span id="s<?=$value['id']?>"></span> 秒
    </p>
		<p><img src="<?=$value['img']?>" width='280' height='200'></p>
		<p><?=$value['name']?></p>
		<p><?=$value['price']?></p>
		<p><input type="button" value="抢购" id="<?=$value['id']?>"></p>
		</div>
	<?php } ?>
</body>
</html>
<script>
    //倒计时
	$(document).ready(function(){
       window.setInterval(function(){
       	//ajax传值
       	$.ajax({
       		url:'chutime.php',
       		type:'get',
       		dataType:'json',
       		success:function(data){
              //console.log(data);
              for (var i = 0; i< data.length; i++) {
                 id = data[i]['id'];
                 $('#h'+id).text(data[i]['hour']);
                 $('#f'+id).text(data[i]['minute']);
                 $('#s'+id).text(data[i]['miao']);
              }
       		}
       	})
       },1000)
	})

   //当点击抢购有按钮时
   $("input[type=button]").click(function(){
       //alert(1);
       var id = $(this).attr('id');
       $.ajax({
        url:'miaosha.php',
        type:'get',
        dataType:'json',
        data:{'id':id},
        success:function(data){
             if (data['code']==1) {
               alert(data['msg']);
             }else{
               alert(data['msg']);
             }
        }
       })
   })
</script>