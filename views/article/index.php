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
                ]
            ]);?>
        </div>
    </div>
</div>
<!--<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">-->
<!--    Launch demo modal-->
<!--</button>-->
<!---->
<!--<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--                <h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                I Love You !-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
