<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Archives */
/* @var $form yii\widgets\ActiveForm */
?>
<head xmlns="http://www.w3.org/1999/html">
        <meta charset="UTF-8">
        <title>Love Story</title>
<!--        <link rel="stylesheet" type="text/css" href="/basic/webuploader-0.1.5/webuploader.css">-->
        <link rel="stylesheet" href="/lovestory/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="/lovestory/font/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/lovestory/markdown/css/bootstrap-markdown.min.css">
        <script src="/lovestory/markdown/js/bootstrap-markdown.js"></script>
        <script src="/lovestory/markdown/locale/bootstrap-markdown.zh.js"></script>
<!--    <script type="text/javascript" src="/basic/webuploader-0.1.5/webuploader.js"></script>-->
    <script src="../font/dist/js/bootstrap.js"></script>
    <style>
        body{
            background-color: antiquewhite;
        }
        .title{
            width:400px;
        }
        </style>
    </head>


<!--<form>-->
<!--    <textarea name="content" data-provide="markdown" data-savable="true" data-language="zh" rows="20"></textarea>-->
<!--    <hr/>-->
<!--    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;提交</button>-->
<!--</form>-->
<!--<div id="mark"></div>-->
<?php $form= ActiveForm::begin();?>
<center><div class="title">
<?= $form->field($model,'article')->textInput(['placeholder'=>'请填写文章题目'])?>
    </div></center>
<?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions'=>[
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['redactor/upload/image'],
        'fileUpload' => ['redactor/upload/file'],
        'lang' => 'zh_cn',
        'height'=>'500px',
        'placeholder'=>'下面有请小猪仔写文章',
        'plugins' => ['clips', 'fontcolor','imagemanager','fontsize','fontfamily','fullscreen','video','table','textexpander','textdirection'],
    ]
]) ?>
<?=$form->field($model,'tag')->textarea(['rows'=>1,'placeholder'=>'文章的标签啊,小猪仔'])->label('')?>
<?=$form->field($model,'status')->inline(['width'=>0])->radioList(['1'=>'立即发布','2'=>'草稿箱','3'=>'仅好友可见'],['labelOptions'=>['style'=>'width:30px;']])->label('')?>
<?=Html::submitButton('提交',['class'=>'btn btn-success'])?>
<?php ActiveForm::end()?>
<script type="text/javascript">
    $("#mark").markdown({language:'zh'});
    </style>


