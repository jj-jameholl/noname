<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/5
 * Time: 下午7:36
 */
use yii\helpers\Html;
?>
<head>
    <link rel="stylesheet" href="/lovestory/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="/lovestory/font/dist/css/bootstrap.min.css">
    <!--    <script type="text/javascript" src="/basic/webuploader-0.1.5/webuploader.js"></script>-->
<!--    <script src="../font/dist/js/bootstrap.js"></script>-->
    </head>
<div class="Article">
<div class="Title">
    <h4><a href="<?=$model->url;?>"><?=Html::encode($model->article);?></a></h4>
    <div class="info">
    <span class="glyphicon glyphicon-user" ></span>&nbsp;<em><?=Html::encode($model->writer);?></em>&nbsp;&nbsp;
    <span class="glyphicon glyphicon-time" ></span>&nbsp;<em><?=date('Y-m-d H:i:s',$model->created);?></em>&nbsp;&nbsp;
    <span class="glyphicon glyphicon-pencil" ></span><em><?='评论:'.$model->comments?></em>&nbsp;&nbsp;
    <span class="glyphicon glyphicon-heart" ></span>&nbsp;<em><?=$model->loves?></em>&nbsp;&nbsp;
    </div>
    </div>
    <br>
    <div class="content">
     <?=mb_substr(strip_tags($model->content),0,140,'utf-8')?>
     <?=mb_strlen(strip_tags($model->content))>140?'.......':'';?>
</div>
    <br>
    <div class="nav">
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
        <?= $model->tag; ?>

        </div>
</div>
<hr>
