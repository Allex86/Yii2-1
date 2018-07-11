<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accessed Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-my">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'text:ntext',
            'dt',
            [
            	'label' => 'Name creator',
            	//'value' => 'creator.name',
            	'value' => function(\app\models\Event $model)
            	{
            		return Html::a(
            			$model->creator->name,
            			[
            				'user/view',
            				'id' => $model->creator_id
            			]
            		);
            	},
            	'format' => 'html'
            ],
            'created_at:datetime',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
