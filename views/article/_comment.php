<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/8
 * Time: 下午9:16
 */
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\HtmlPurifier;

$this->registerJs('
    $(".reply").click(function(){
    $(".comment-form").removeClass("hidden");
    $(".comment-form").appendTo($(this).parent());
    $(".comment-form").find("input").filter(".input2").val($(this).parent().attr("class"));
    });
');

$dataprovider_son = $model->search_son($model->id);
?>
<head>
    <style>
    a{
    color:#337ab7;
    }
    .jubao{
        float:right;
    }
    .media-heading{
        color:#999
    }
    .hint{
        color:#999;
        font-size: 12px;
    }
    em{
        color:red;
    }
        .hr2{
            margin-top: 8px;
        }
        .up_down{
            float:right;
            color:#999;
            font-size:12px;
        }
    </style>

    </head>
<div class="media">
<a class="media-left">
<img src="/lovestory/photo/<?=$model->img?>" class="img_comment" alt="...">
</a>
    <div class="media-body">
        <div class="media-heading">
            <a href=""><?=$model->username?></a>&nbsp;&nbsp;&nbsp;评论于<?=date('Y-m-d H:i',$model->createdTime)?><a class="jubao" href=""><span class="glyphicon glyphicon-envelope"></span>举报</a>
        </div>
            <p><?=yii\helpers\Markdown::process($model->content,'gfm')?></p>
        <?php if($dataprovider_son->getTotalCount()!=0){?>
            <div class="hint">共&nbsp;<em><?=$dataprovider_son->getTotalCount()?></em>&nbsp;条回复</div>
        <?=ListView::widget([
            'id'=>$model->id,
            'dataProvider'=>$dataprovider_son,
            'itemView'=>'_comment_son',
            'layout'=>'{items}{pager}',
            'pager'=>[
                'maxButtonCount'=>8,
//                'nextPageLabel'=>Yii::t('app','》'),
//                'prevPageLabel'=>Yii::t('app','《'),
            ],
        ]);?>
        <?php }?>
        <div class="<?=$model->id?>">
    <a href="javascript:;" class="reply"><span class="glyphicon glyphicon-share-alt"></span>回复</a><div class="up_down"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?=$model->up?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<?=$model->down?></div>
    </div>
        </div>
</div>
<hr class="hr2">


