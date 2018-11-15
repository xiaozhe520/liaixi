<?php 
class Safety extends IController{
	//登录
   public function login(){
   	$this->redirect('login');
   }
   //登录处理
   public function login_ok(){
    $user1=new IModel('user1');
    $username = IReq::get('username');
    $userpwd = IReq::get('userpwd');
    $userpwd = md5($userpwd);
    $data=$user1->getObj("username='$username' and userpwd='$userpwd'");
    if ($data) {
    	$this->redirect('/site/index');
    }else{
       $this->redirect('login');
    }
   }
   //注册
   public function zhu(){
    $this->redirect('zhu');
   }
   //注册处理
   public function zhuok(){
   $user1=new IModel('user1');
   $username = IReq::get('username');
   $userpwd = IReq::get('userpwd');
   $time = time();
   $data = array(
     'username'=>$username,
     'userpwd'=>md5($userpwd),
     'addtime'=>$time
   	); 
   $user1->setData($data);
   if ($user1->add()) {
    $this->redirect('login');
   }
   }
   //显示
   public function show(){
   $user1=new IModel('user1');
   $data = $user1->query();
   $this->setRenderData(['data'=>$data]);
   $this->redirect('show');
   }
   //修改
   public function xiu(){
   $user1=new IModel('user1');
   $id = IReq::get('id');
   $data = $user1->query("id=$id");
   $this->setRenderData(['data'=>$data]);
   $this->redirect('xiu');
   }
   //修改处理
   public function xiu_ok(){
   $user1=new IModel('user1');
   $id = IReq::get('id');
   $username = IReq::get('username');
   $data = array(
      'id'=>$id,
      'username'=>$username
   	);
   $user1->setData($data);
   $where = "id=".$id;
   if ($user1->update($where)) {
    $this->redirect('show');
   }else{
   	$this->redirect('xiu');
   }
   }
   //删除
   public function delete(){
   $user1=new IModel('user1');
   $id = IReq::get('id');
   if ($user1->del("id=$id")) {
   	$this->redirect('show');
   }
   }
}

 ?>