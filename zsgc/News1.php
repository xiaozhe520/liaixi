<?php 
namespace frontend\models;

use yii\db\ActiveRecord;

class News1 extends ActiveRecord
{
	public function rules(){
      return [
       ['name', 'required', 'message' => '标题不能为空'],
       ['rong', 'required', 'message' => '内容不能为空'],
      ];
	}
    public function attributeLabels()
    {
    	return [
          'name'=>'标题',
          'rong'=>'内容',
    	];
    }
}