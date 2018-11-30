<?php 
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\News1;
class News1Controller extends Controller
{
   public function actionIndex(){
    $model = new News1();

   	if (yii::$app->request->isPost) {
   	$data = yii::$app->request->post();
   	$model->addtime=time();

    if ($model->load($data) && $model->save()) {
       return $this->redirect(['news1/xian']);
    }
   	}else{
     return $this->render('index',['model'=>$model]);
   	}
   }

   public function actionXian(){
   	 $data = Yii::$app->db->createCommand('SELECT * FROM news1')->queryAll();
   	 return $this->render('xian',['data'=>$data]);
   }
   public function actionShan(){
   	$id = yii::$app->request->get('id');
    $res=Yii::$app->db->createCommand()->delete('news1', "id=$id")->execute();
    if ($res) {
    	return $this->redirect(['news1/xian']);
    }else{
    	echo "删除失败";
    }
   }
   public function actionXiu(){
     $id = yii::$app->request->get('id');
     $data = Yii::$app->db->createCommand("select * from news1")->queryOne();
     // print_r($data);die;
   	 return $this->render('xiu',['data'=>$data]);
   }
   public function actionXiu_do(){
   	 $id = yii::$app->request->post('id');
   	 $name = yii::$app->request->post('name');
   	 $res=Yii::$app->db->createCommand()->update('news1', ['name'=>$name], "id=$id")->execute();
   	 if ($res) {
   	 	return $this->redirect(['news1/xian']);
   	 }else{
       echo "修改失败";
   	 }
   }
}