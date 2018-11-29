<?php 
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
class CeController extends Controller
{
  public function actionLogin_do(){
   return $this->render('login');
  }
  public function actionLogin_chu(){
  	$name = Yii::$app->request->post('name');
  	$eamil = Yii::$app->request->post('eamil');
  	$pwd = md5(Yii::$app->request->post('pwd'));
  	// echo $name;
  	$addtime=time();
  	$sql ="insert into user(name,email,pwd,addtime) values('$name','$eamil','$pwd',$addtime)";
  	yii::$app->db->createCommand($sql)->execute();
  }
  public function actionXian(){
    $sql = "select * from user ";
    $command = yii::$app->db->createCommand($sql);
    $data = $command->queryAll();
    return $this->render('xian',['data'=>$data]);
  }
  public function actionShan(){
    $id = Yii::$app->request->get('id');
    yii::$app->db->createCommand()->delete('user', "id = $id")->execute();
  }
  public function actionXiu(){
    $id = Yii::$app->request->get('id');
    $sql = "select * from user where id= $id";
    $data=yii::$app->db->createCommand($sql)->queryOne();
    return $this->render('xiu',['data'=>$data]);
  }
  public function actionXiu_do(){
     $id = Yii::$app->request->post('id');
     $name = Yii::$app->request->post('name');
     yii::$app->db->createCommand()->update('user', ['name' => $name],"id=$id")->execute();
  }
}
 ?>