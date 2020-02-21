<?php

use dsj\components\grid\ResponsiveActionColumn;
use dsj\components\grid\ResponsiveGridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\demo\models\DemoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demo-index">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
                 <?= Html::button('Create Demo', ['class' => 'btn btn-success data-create','url' => Url::to(['create'])]) ?>
        </p>

    <?= ResponsiveGridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                'id',
            'text',
            'type',
            'time',
            'radio',
            //'area',

            ['class' => ResponsiveActionColumn::className()],
    ],
    ]); ?>
</div>
