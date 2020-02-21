<?php

use yii\helpers\ArrayHelper;

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height: 55px">
            <div class="pull-left image">
                <img src="<?= ArrayHelper::getValue($adminuserInfo,'pic')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> <?= ArrayHelper::getValue($adminuserInfo,'nickname')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="button" name="search" id="search-btn" class="btn btn-flat" onclick="search_menu()"><i
                            class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">

        </ul>
    </section>

</aside>