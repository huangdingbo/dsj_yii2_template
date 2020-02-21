<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\demo\models\Demo */

$this->title = '查看:' . $model->id;
?>
<div class="demo-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'type',
            'time',
            'radio',
            'area',
        ],
    ]) ?>

</div>



