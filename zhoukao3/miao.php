<?php 
$pdo = new PDO("mysql:host=127.0.0.1;dbname=kaoshi","root","root");
$sql = "select * from goods";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
 	<div>
 		<p>
 			<span id="h<?=$value['id']?>"></span> 时
            <span id="f<?=$value['id']?>"></span> 分
            <span id="m<?=$value['id']?>"></span> 秒
 		</p>
 		<p><img src="<?=$value['img']?>" alt=""></p>
        <p>商品名字:<?=$value['name']?></p>
        <p>热销价格:$<?=$value['price']?></p>
        <p><input type="button" value="抢购" id="<?=$value['id']?>"></p>
 	</div>
  <?php } ?>
 </body>
 </html>
 <script>
  //时间计时器
  $(document).ready(function(){
  	 window.setInterval(function(){
       //ajax
       $.ajax({
       	url:'timechu.php',
       	type:'get',
       	dataType:'json',
       	success:function(data){
          // console.log(data);
       		for (var j = 0; j<=data.length; j++) {
               id = data[j]['id'];
               $("#h"+id).text(data[j]['hour']);
               $("#f"+id).text(data[j]['fen']);
               $("#m"+id).text(data[j]['miao']); 
       		};
       	}
       })
  	 },1000);
  })

  $("input[type=button]").click(function(){
    // alert(1);
    var id = $(this).attr('id');
    // alert(id);
    $.ajax({
      url:'miaosha.php',
      type:'get',
      data:{'id':id},
      dataType:'json',
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
