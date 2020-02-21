<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = false;
?>
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i></h2>

        <div class="error-content">
            <h3><?= $name ?></h3>

            <p>
                <?= nl2br(Html::encode($message)) ?>
            </p>

            <p>
                上述错误发生在Web服务器处理您的请求时。
                如果您认为这是服务器错误，请与我们联系。谢谢！
                与此同时,你可能想 <a href='<?= Url::to(['index/index']) ?>'>回到首页</a>
            </p>

<!--            <form class='search-form'>-->
<!--                <div class='input-group'>-->
<!--                    <input type="text" name="search" class='form-control' placeholder="Search"/>-->
<!---->
<!--                    <div class="input-group-btn">-->
<!--                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
        </div>
    </div>

</section>
