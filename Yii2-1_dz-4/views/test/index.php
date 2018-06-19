<?php 
/**
 * @var $test string with html code app\controllers\TestController
 * @var $model app\models\Product
 **/
?>

<h2 class="jumbotron">This is Test Lorem</h2>
<div class="jumbotron">
	<h1>
		<?= $test ?>
	</h1>
</div>


<h2 class="jumbotron">This is Test DetailView</h2>
<p>
	<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>
</p>


<h2 class="jumbotron">This is Test TestService</h2>
<div class="jumbotron"><?= $test_service ?></div>