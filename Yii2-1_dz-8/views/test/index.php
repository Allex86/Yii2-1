<?php 
/**
 * @var $test string with html code app\controllers\TestController
 * @var $model app\models\Product
 **/
?>

<center>
	<h2>This is Test Lorem</h2>
	<div>
		<h1>
			<?= $test ?>
		</h1>
	</div>
</center>

<center>
	<h2>This is Test DetailView</h2>
	<p>
		<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>
	</p>
</center>

<center>
	<h2>This is Test TestService</h2>
	<div><?= $test_service ?></div>
</center>