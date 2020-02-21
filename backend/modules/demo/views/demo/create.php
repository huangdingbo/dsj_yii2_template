<?php

/* @var $this yii\web\View */
/* @var $model backend\modules\demo\models\Demo */

$this->title = 'Create Demo';
?>
<div class="demo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
