<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php $form= ActiveForm::begin();?>
 	  <?=$form->field($model, 'name')->textInput() ?>
      <?=$form->field($model, 'rong')->textarea(['rows'=>3]) ?>
      <?=Html::submitButton('提交', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
 	<?php ActiveForm::end(); ?>
 </body>
 </html>