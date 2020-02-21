<?php

use dsj\adminuser\models\Adminuser;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$adminuserId = Yii::$app->user->getId();

if ($adminuserId){
    $adminuserInfo = Adminuser::find()->where(['id'=>$adminuserId])->asArray()->one();
}

?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?=Url::to(['site/index'])?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>D</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo \Yii::$app->id?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="./img/user2-160x160.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="./img/user3-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="./img/user4-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="./img/user3-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="./img/user4-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that
                                        may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-light-blue"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= ArrayHelper::getValue($adminuserInfo,'pic')?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= ArrayHelper::getValue($adminuserInfo,'nickname')?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= ArrayHelper::getValue($adminuserInfo,'pic')?>" class="img-circle" alt="User Image">

                            <p>
                                <?= ArrayHelper::getValue($adminuserInfo,'nickname')?>

                                <small>最后登录于:<?= ArrayHelper::getValue($adminuserInfo,'last_login_time')?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=
                                Html::button('修改密码', [
                                    'id' => 'reset-password',
                                    'class' => 'btn btn-default btn-flat',
                                    'url' => Url::to(['adminuser/reset-password','id' => Yii::$app->user->id]),
                                ]);
                                ?>
                            </div>
                            <div class="pull-right">
                                <a href="<?=Url::to(['site/logout'])?>" class="btn btn-default btn-flat">注销登录</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
        <?php
        $webPath = Yii::getAlias('@web');
        $resetUrl = Url::to(['adminuser/reset-password-ajax','id' => Yii::$app->user->id]);
        $scrf = Yii::$app->request->csrfToken;
        $js = <<<JS
$("#reset-password").on('click',function() {
       let config = {
             'type': 1,
              'title': '修改密码',
              'area': ['400px','280px'],
              'shadeClose': true,
        };
        config.content = 
        '<div style="width:350px;margin-top: 10px">' + 
        '<form class="layui-form" action="">' + 
        '<input type="hidden" name="_csrf-backend" value="$scrf">' + 
        '<div class="layui-form-item">' +
        '<label class="layui-form-label">新密码</label>' + 
        ' <div class="layui-input-block">' + 
        ' <input type="password" name="ResetPasswordForm[password]" required lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">' + 
        ' </div>' + 
        ' </div>' + 
         '<div class="layui-form-item">' +
        '<label class="layui-form-label">重新输入</label>' + 
        ' <div class="layui-input-block">' + 
        ' <input type="password" name="ResetPasswordForm[password_repeat]" required lay-verify="required" placeholder="请重新输入新密码" autocomplete="off" class="layui-input">' + 
        ' </div>' + 
        ' </div>' +
        ' <div class="layui-form-item">' + 
        '<div class="layui-input-block">' +  
        '<button class="layui-btn" lay-submit lay-filter="reset-password">提交</button>' + 
        '</div>' + 
        '</div>' + 
        '</form>' +
        '</div>'        
        ;
          layui.config({
                base: '$webPath/layui/src/layuiadmin/'
            }).use(['layer','form'], function(){
                var layer = layui.layer;
                var form = layui.form;
                   var index = layer.open(config);
                   form.on('submit(reset-password)', function(obj){
                    $.ajax({
                    type: "POST",
                    url: "$resetUrl",
                    data: obj.field,
                    dataType: "json",
                    success: function(data){
                        if (data.code == '200'){
                              layer.msg(data.msg,{offset: '50px',icon: 1 ,time: 1000});
                              layer.close(index);
                        }else {
                             layer.msg(data.msg,{offset: '50px',icon: 2 ,time: 1000})
                        }
                    }
			        });
                    return false;
                });
                   
            });
    });
JS;
        $this->registerJs($js);

        ?>
    </nav>
</header>