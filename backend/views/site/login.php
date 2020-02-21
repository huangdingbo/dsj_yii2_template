<?php

use dsj\components\assets\LayuiAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
LayuiAsset::register($this);
$this->title = false;
$css = <<<CSS
    .pro_name a{color: #4183c4;}
    .osc_git_title{background-color: #fff;}
    .osc_git_box{background-color: #fff;}
    .osc_git_box{border-color: #E3E9ED;}
    .osc_git_info{color: #666;}
    .osc_git_main a{color: #9B9B9B;}
CSS;
$this->registerCss($css);

?>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b><?=Yii::$app->id?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">登录开始您的会话</p>
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'layui-form'],'enableClientValidation' => false])?>

                <?= $form->field($model, 'username',['options' => ['class' => 'layui-form-item'],])
                    ->textInput(['class' => "layui-input",'placeholder' => $model->getAttributeLabel('username')])
                    ->label('',['class' => 'layadmin-user-login-icon layui-icon layui-icon-username'])
                ?>

                <?= $form->field($model, 'password',['options' => ['class' => 'layui-form-item']])
                    ->passwordInput(['id' => 'LAY-user-login-password','class' => "layui-input",'placeholder' => $model->getAttributeLabel('password')])
                    ->label('',['class' => 'layadmin-user-login-icon layui-icon layui-icon-password'])
                ?>
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="AdminuserAjaxLoginForm[rememberMe]" lay-skin="primary" title="记住密码">
                </div>

                <div class="layui-form-item"">
                    <div id="slider" lay-filter="LAY-user-login-submit"></div>
                    <?= Html::Button('登录', ['class' => 'layui-btn layui-btn-fluid','id' => 'sub',"lay-submit lay-filter"=>"LAY-user-login-submit","style" => "display:none"]) ?>
                </div>

                <?php ActiveForm::end()?>
            </div>

        </div>
    </div>

    <button style="display: none"></button>
<?php
$url = Yii::$app->homeUrl;
$checkUrl = \yii\helpers\Url::to(['site/check']);
$tockenUrl = \yii\helpers\Url::to(['site/get-tocken']);
$webPath = Yii::getAlias('@web');
$js = <<<JS
layui.config({
			base: '$webPath/layui/src/layuiadmin/'
		}).extend({
		    sliderVerify: 'layui_exts/sliderVerify/sliderVerify',
		    index: 'lib/index'
		}).use(['sliderVerify','index','user'], function() {
		      var $ = layui.$
                ,setter = layui.setter
                ,admin = layui.admin
                ,form = layui.form
                ,router = layui.router()
                ,search = router.search
                ,sliderVerify = layui.sliderVerify;
		    let tocken = "$tocken";
			var slider = sliderVerify.render({
				elem: '#slider',
				onOk: function(){//当验证通过回调
				    form.render();
				    
				    form.on('submit(LAY-user-login-submit)',function(obj) {
				        if(!slider.isOk()){
				            layer.msg("请先通过滑块验证");
				        }
				        //获取tocken
				        
				        obj.field["AdminuserAjaxLoginForm[tocken]"]=tocken;
				        if (obj.field.hasOwnProperty('AdminuserAjaxLoginForm[rememberMe]')) {
                            obj.field["AdminuserAjaxLoginForm[rememberMe]"]= '1';
                        }else {
                            obj.field["AdminuserAjaxLoginForm[rememberMe]"]= '0';
                        }
				        //请求登入接口
                         $.ajax({
                            type: "POST",
                            url: "$checkUrl",
                            data: obj.field,
                            dataType: "json",
                            success: function(data){
                                if (data.code == 200) {
                                     layer.msg('登入成功', {
                                       offset: '15px'
                                       ,icon: 1
                                       ,time: 1000
                                   }, function(){
                                       location.href = "{$url}"; //后台主页
                                   });
                                } else {
                                    tocken=data.tocken;
                                    layer.msg(data.msg,{offset: '15px',icon: 2 ,time: 1000})
                                    slider.reset();
                                    // window.location.reload();
                                }
                            }
                        });

                    });
				
				    
				   $('[lay-filter="LAY-user-login-submit"]').click(); //模拟点击事件
				}
			})
			
		})
JS;
$this->registerJs($js);
?>