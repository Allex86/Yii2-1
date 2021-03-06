<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
    <!-- <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'price')->dropDownList(['111' => 'первый', '222' => 'второй', '333' => 'третий', 'Значение с ошибкой' => 'Значение с ошибкой', '1001' => 'Значение больше 1000']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
