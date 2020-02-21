<?php


use dsj\adminuser\models\Adminuser;
use dsj\components\assets\AdminLTEAsset;
use dsj\components\assets\LayuiAsset;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = Yii::$app->id;
$adminuserId = Yii::$app->user->getId();

$adminuserInfo = [];

if ($adminuserId){
    $adminuserInfo = Adminuser::find()->where(['id'=>$adminuserId])->asArray()->one();
}

if (Yii::$app->controller->action->id === 'login') {
        /**
         * Do not use this code in your template. Remove it.
         * Instead, use the code  $this->layout = '//main-login'; in your controller.
         */
        echo $this->render(
            'main-login',
            ['content' => $content]
        );
    }else{ ?>

    <?php AdminLTEAsset::register($this);?>
    <?php LayuiAsset::register($this);?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php
        $this->registerCss(" <style type=\"text/css\">
                html {
                    overflow: hidden;
                }
            </style>")
        ?>

        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header-iframe.php',
            ['adminuserInfo' => $adminuserInfo]
        ) ?>

        <?= $this->render(
            'left-iframe.php',
            ['adminuserInfo' => $adminuserInfo]
        ) ?>

        <?= $this->render(
            'content-iframe.php'
        ) ?>

        <?= $this->render(
            'footer-iframe.php'
        ) ?>

        <?= $this->render(
            'right-iframe.php'
        ) ?>

        <div class="control-sidebar-bg"></div>
    </div>

    <?php

    //首页地址
    $indexPath = Url::to(['/index/index']);
    $menuPath = Url::to(['/menu/menu/list']);
    $js = <<<JS
/**
         * 本地搜索菜单
         */
        function search_menu() {
            //要搜索的值
            var text = $('input[name=q]').val();

            var ul = $('.sidebar-menu');
            ul.find("a.nav-link").each(function () {
                var a = $(this).css("border", "");

                //判断是否含有要搜索的字符串
                if (a.children("span.menu-text").text().indexOf(text) >= 0) {

                    //如果a标签的父级是隐藏的就展开
                    ul = a.parents("ul");

                    if (ul.is(":hidden")) {
                        a.parents("ul").prev().click();
                    }

                    //点击该菜单
                    a.click().css("border", "1px solid");
                }
            });
        }

        $(function () {
            App.setbasePath("../");
            App.setGlobalImgPath("dist/img/");

            addTabs({
                id: '10008',
                title: '首页',
                close: false,
                url: "$indexPath",
                urlType: "abosulte"
            });

            App.fixIframeCotent();

            /*addTabs({
             id: '10009',
             title: '404',
             close: true,
             url: 'UI/buttons_iframe2.html'
             });*/

            /*
             <li class="treeview">
             <a href="#">
             <i class="fa fa-edit"></i> <span>Forms</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
             <li><a href="forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
             <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
             <li><a href="forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
             </ul>
             </li>
             */
            var menus = [];
             $.ajax({url:"$menuPath",success:function(result){
                if (result.code == 200){
                    $('.sidebar-menu').sidebarMenu({data: result.list});
                }
            }});
            // 动态创建菜单后，可以重新计算 SlimScroll
            $.AdminLTE.layout.fixSidebar();

            if ($.AdminLTE.options.sidebarSlimScroll) {
                if (typeof $.fn.slimScroll != 'undefined') {
                    //Destroy if it exists
                    var sidebar = $(".sidebar");
                    sidebar.slimScroll({destroy: true}).height("auto");
                    //Add slimscroll
                    sidebar.slimscroll({
                        height: ($(window).height() - $(".main-header").height()) + "px",
                        color: "rgba(0,0,0,0.2)",
                        size: "3px"
                    });
                }
            }

        });
JS;
    $this->registerJs($js);

    ?>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

<?php }?>



