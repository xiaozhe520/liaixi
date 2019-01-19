<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'hang') ?>
    <?= Html::submitButton('增加') ?>
<?php ActiveForm::end(); ?>