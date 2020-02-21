<?php

/* @var $this yii\web\View */
/* @var $model backend\modules\demo\models\Demo */

$this->title = 'Update Demo: {nameAttribute}';
?>
<div class="demo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

