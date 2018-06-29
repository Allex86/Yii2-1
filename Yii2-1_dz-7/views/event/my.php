<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-my">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'text:ntext',
            'dt',
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {share}',
                'buttons' => [
                    'share' => function ($url, $model, $key) 
                    {
                        return Html::a(\yii\bootstrap\Html::icon('share-alt'),
                            [
                                'access/create', 'eventId' => $model->id
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
