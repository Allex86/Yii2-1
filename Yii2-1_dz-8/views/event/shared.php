<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shared Events';
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
            	'label' => 'Users',
            	'value' => function(\app\models\Event $model)
            	{
            		$ids = $model->getAccessedUsers()->select('name')->column();
            		return $ids ? join(', ', $ids) : '';
            	}
            ],
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {unshareAll}',
                'buttons' => [
                    'unshareAll' => function ($url, $model, $key) 
                    {
                        return Html::a(
                        	\yii\bootstrap\Html::icon('ban-circle'),
                        	[
                        		'access/delete-all',
                                'eventId' => $model->id,
                        	],
                            [
                           	'data' => 
                           	    [
            					   'confirm' => 'Are you sure you want to delete this item?',
            					   'method' => 'post',
            					],
                           ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
