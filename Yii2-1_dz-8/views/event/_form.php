<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dt')->widget(\dosamigos\datepicker\DatePicker::class, [
   		'language' => 'en',
   		'size' => 'lg',
   		'clientOptions' => 
   		[
   		 	'autoclose' => true,
   		 	'format' => 'yyyy-mm-dd'
         ]
	]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
