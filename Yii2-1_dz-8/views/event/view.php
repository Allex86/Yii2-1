<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'dt',
            'creator_id',
            'created_at:datetime',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Name',
                'value' => function($model)
                {
                    $uid = $model->user_id;
                    return \app\models\User::findOne($uid)->name;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{unshared}',
                'buttons' => [
                    'unshared' => function ($url, $model, $key) 
                    {
                        return Html::a(
                            \yii\bootstrap\Html::icon('remove-circle'),
                            [
                                'access/delete',
                                'id' => $model->id,
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

</div>
