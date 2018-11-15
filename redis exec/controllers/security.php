<?php 
//引用 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Security extends IController{
	//员工注册
   public function login(){
   	$this->redirect('login');
   }
   //处理员工信息
   public function yong_ok(){
    $name = IReq::get('name');
    $pwd = md5(IReq::get('pwd'));
    $zhen = IReq::get('zhen');
    $gong = IReq::get('gong');
    $user2 = new IModel('user2');
    $data = [
		'name' => $name,
		'pwd' => $pwd,
		'zhen' => $zhen,
		'gong' => $gong,
     ];
	$user2->setData($data);
	$user2->add();
   }
   //管理员登录
   public function guan(){
    $this->redirect('guan');
   }
   //管理员处理
   public function guan_ok(){
    $name = IReq::get('name');
    $pwd = md5(IReq::get('pwd'));
    $guan = new IModel('guan');
    //调用IModel类的getObj方法查询数据，getObj返回单条数据（一维数组）
    $data = $guan->getObj("name='$name' and pwd='$pwd'");
    if ($data) {
        //登录成功吧用户名存到session里
        $session = new ISession;
        $session->set('name',$name);
        $this->redirect('/security/xian',true);
    }else{
    	echo "登录失败";
    }
   }

   //显示数据
   public function xian(){
   	//redis
   	$redis = new Redis;
   	$redis->connect('127.0.0.1',6379);

    $user2= new IModel('user2');
   	$gname = isset($_POST['gname'])?$_POST['gname']:'';
   	if ($gname!='') {
   		if ($redis->exists($gname)) {
   			//在次找就该调用缓存了
   			$str = $redis->get($gname);
   			$data = json_decode($str,true);
   			// var_dump($data);die;
   			echo "这是缓存里的";
   		}else{
   			//找到以后就该存到redis里面用josn
   		$data=$user2->query("name like '%$gname%'");
   		//var_dump($data);die;
   		$res = json_encode($data);
   		$redis->set($gname,$res);
        echo "这是数据库里的";
        }
   	}else{
    	$data = $user2->query();
   	}

   	$this->setRenderData(['data'=>$data]);
   	$this->redirect('xian');
   }
   
   //导出
   public function chu(){
   include 'plugins/vendor/autoload.php';
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'Hello World !');
   $user2=new IModel('user2');
   $arrayData = $user2->query();
   // echo "<pre>";
   // print_r($arrayData);die;
	$spreadsheet->getActiveSheet()
	    ->fromArray(
	        $arrayData,  // The data to set
	        NULL,        // Array values with this value will not be set
	        'A3'         // Top left coordinate of the worksheet range where
	                     //    we want to set these values (default is A1)
	    );
   $sheet->setTitle('员工工资详情');
   $writer = new Xlsx($spreadsheet);
   $writer->save("public/yuangong.xlsx");
   //保存文件
   $guan_log = new IModel('guan_log');
   $data = [
    'adminname'=>ISession::get('name'),
    'ip'=>$_SERVER['REMOTE_ADDR'],
    'addtime'=>time(),
   ];
   $guan_log->setData($data);
   $guan_log->add();
   }
   //导入
  public function ru(){
  	require 'plugins/vendor/autoload.php';
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
	$reader->setReadDataOnly(TRUE);
	$spreadsheet = $reader->load("public/yuangong.xlsx");

	$worksheet = $spreadsheet->getActiveSheet();
	// Get the highest row number and column letter referenced in the worksheet
	$highestRow = $worksheet->getHighestRow(); // e.g. 10
	$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
	// Increment the highest column letter
	$highestColumn++;
	for ($row = 3; $row <= $highestRow; ++$row) {
	    for ($col = 'B'; $col != $highestColumn; ++$col) {
	             $res[$row-3][]=$worksheet->getCell($col . $row)->getValue();
    }
}
  
   $user2=new IModel('user2');
   foreach ($res as $key => $value) {
   	$arr=[
      'name'=>$value[0],
      'pwd'=>$value[1],
      'zhen'=>$value[2],
      'gong'=>$value[3]
   	];
   	$user2->setData($arr);
   	$user2->add();
   }


  }
}

 ?>