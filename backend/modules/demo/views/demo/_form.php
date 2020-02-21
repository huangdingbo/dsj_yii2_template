<?php

use kartik\date\DatePicker;
use manks\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\demo\models\Demo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true])->label('输入框') ?>

    <?= $form->field($model, 'type')->dropDownList([1 => 'type为1',2 => 'type为2'])->label('下拉框')?>

    <?= $form->field($model, 'time')->widget(DatePicker::className(),[
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ])->label('时间选择器，支持到天，DateTimePicker 支持到秒')?>

    <?= $form->field($model, 'radio')->radioList([1 => '是',2 => '否'])->label('radio选择')?>

    <?= $form->field($model, 'area')->textarea(['rows' => 5,'style' => ['resize' => 'none']])->label('文本输入域，加style是让其不允许被拉伸') ?>

    <?= $form->field($model, 'video')->widget(\yii\redactor\widgets\Redactor::className(),[
        'clientOptions' => [
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ]
    ])?>

    <?= $form->field($model, 'pic')->widget('manks\FileInput',[
        'clientOptions' => [
            'pick' => [
                'multiple' => false, // 单图，true多图
                'type' => 1, //上传图片，会显示图片，type为UPLOAD_VIDEO不显示图片
            ],
        ]
    ]) ?>

    <?= $form->field($model, 'video')->widget('manks\FileInput',[
        'clientOptions' => [
            'pick' => [
                'multiple' => false, // 单图，true多视频
                'type' => 1, //type为UPLOAD_VIDEO不显示图片
            ],
            'accept' => [
                'extensions' => 'gif,jpg,jpeg,bmp,png,mp4', //运行上传的文件类型
            ],
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
