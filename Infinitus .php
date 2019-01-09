# liaixi
每日练习
public function actionWu(){
     $data = yii::$app->db->createCommand("select * from goods")->queryAll();
     $arr = [];
     //获取id成为键
     foreach ($data as $k => $v) {
         $arr[$v['id']]= $v;
     }
     //分类
     foreach ($arr as $k => $v) {
         if (isset($arr[$v['pid']])) {
             $arr[$v['pid']]['son'][]=&$arr[$k];
         }else{
            $temp[] = &$arr[$k]; 
         }
     }
     echo "<pre>";
     print_r($temp);
    }
