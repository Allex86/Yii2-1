<?php 
/**
 * @var $test string with html code app\controllers\TestController
 * @var $model app\models\Product
 **/
?>

<h2 style="text-align: center;">This is Test Lorem</h2>
<div><?= $test ?></div>

<h2 style="text-align: center;">This is Test DetailView</h2>
<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>