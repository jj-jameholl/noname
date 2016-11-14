<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/5
 * Time: 下午7:00
 */
use yii\widgets\ListView;
use yii\Helpers\Html;
?>
<head>
<script src="../font/dist/js/bootstrap.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ol class="breadcrumb">
            <li><a href="<?= Yii::$app->homeUrl; ?>">首页</a></li>
                <li>文章列表</li>
            </ol>
            <?=ListView::widget([
                'id'=>'ArticleList',
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                'layout'=>'{items}{pager}',
                'pager'=>[
                    'maxButtonCount'=>10,
                    'nextPageLabel'=>Yii::t('app','下一页'),
                    'prevPageLabel' =>Yii::t('app','上一页'),
                ]
            ]);?>
        </div>
    </div>
</div>

