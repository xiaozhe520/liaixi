<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Img;
use yii\web\UploadedFile;
use yii\data\Pagination;
use backend\models\Dhang;



class ImgController extends Controller
{
  public $enableCsrfValidation = false;
  //上传
   public function actionUpload()
    {
        $model = new Img();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ( $img = $model->upload()) {
                Yii::$app->db->createCommand()->insert('img', [
                  'imageFile' => $img,
              ])->execute();
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
   //增加
    public function actionShow()
    {
    $query = Img::find();

    // 得到文章的总数（但是还没有从数据库取数据）
    $count = $query->count();

    // 使用总数来创建一个分页对象
    $pagination = new Pagination(['totalCount' => $count,'PageSize'=>2]);

    // 使用分页对象来填充 limit 子句并取得文章数据
    $data = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        // var_dump($data);die;
     return $this->render('show',['data'=>$data,'pagination'=>$pagination]);
    }


    //删除
    public function actionDel()
    {
      $id = Yii::$app->request->get('id');
      Yii::$app->db->createCommand()->delete('img', "id = $id")->execute();
       // echo"删除成功";
      return $this->redirect(['img/show']);
    }




    /**
     * 导航
     */
    //增加
    public function actionDadd()
    {
      $model = new Dhang();
      if (Yii::$app->request->isPost) {
         $model->load(Yii::$app->request->post());
         $model->save();
        return;
      }
     return $this->render('dadd',['model'=>$model]);
    }

    //显示
    public function  actionDshow()
    {
      $query = Dhang::find();
      // 得到文章的总数（但是还没有从数据库取数据）
      $count = $query->count();

      // 使用总数来创建一个分页对象
      $pagination = new Pagination(['totalCount' => $count,'PageSize'=>2]);

      // 使用分页对象来填充 limit 子句并取得文章数据
      $data = $query->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();
      return $this->render('dshow',['data'=>$data,'pagination'=>$pagination]);
    }

    //删除
    public function actionDdel()
    {
     $id = Yii::$app->request->get('id');
     $customer = Dhang::findOne($id);
     $res=$customer->delete();
     if ($res) {
       return $this->redirect(['img/dshow']);
     }
    }
    //修改
    public function actionDxiu()
    {
      $id = Yii::$app->request->get('id');
      $data = Dhang::find()->one();
      if (Yii::$app->request->isPost) {
        $hang = Yii::$app->request->post('hang');
        $id = Yii::$app->request->post('id');
        $customer = Dhang::findOne($id);
        $customer->hang = $hang;
        $res=$customer->save();
        if ($res) {
         return $this->redirect(['img/dshow']);
       }
      }
      return $this->render('dxiu',['data'=>$data]);
    }

}
