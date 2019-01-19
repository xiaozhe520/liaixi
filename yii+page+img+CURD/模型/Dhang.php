<?php

namespace backend\models;

use yii;
use yii\db\ActiveRecord;

class Dhang extends ActiveRecord
{
     public static function tableName()
    {
        return 'dhang';
    }

   public function attributeLabels()
    {
        return [
            'hang' => '导航名',
        ];
    }
    public function rules()
    {
        return [
            [['hang'], 'required'],
        ];
    }


}