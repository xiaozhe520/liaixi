<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Img extends ActiveRecord
{

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $filename = substr(md5(time()), 0,8);
            $this->imageFile->saveAs('uploads/' .$filename. '.' . $this->imageFile->extension);
            $name = 'http://www.yii.com/backend/web/uploads/'.$filename. '.' . $this->imageFile->extension;
            return $name;
        } else {
            return false;
        }
    }
}