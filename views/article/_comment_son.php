<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/8
 * Time: 下午11:04
 */
use yii\helpers\HtmlPurifier;
$this->registerJs('
    $(".reply_two").click(function(){
    $(".comment-form").removeClass("hidden");
    $(".comment-form").appendTo($(this).parent().parent().parent());
//    $(".comment-form").closest(".list-view").attr("id");
        $(".comment-form").find("input").filter(".input1").val($(this).parent().attr("class"));
    $(".comment-form").find("input").filter(".input2").val($(this).closest(".list-view").attr("id"));
    });
');
?>
<head>
    <style>
        a{
            color:#337ab7;
        }
        .media-heading{
            color:#999;
            font-size: 50%;
        }
        .hr1{
            margin-top: 8px;
        }
        .reply_two{
            float:right;
        }
    </style>
    <script src="../font/dist/js/jquery-3.1.1.js"></script>
</head>
<hr class="hr1">
<div class="media">
<div class="media-left">
    <img href="" src="/lovestory/photo/<?=$model->img?>" class="img_comment_son" alt="..."/>
</div>
    <div class="media-body">
    <div class="media-heading">
        <div class="<?=$model->username?>">
        <a href=""><?=$model->username?></a>&nbsp;&nbsp;&nbsp;评论于<?=date('Y-m-d H:i',($model->createdTime))?><a class="reply_two"><span class="glyphicon glyphicon-share-alt"></span>回复</a>
        </div>
        </div>
            <p>
                <?php if($model->tousername != null) {?>
                        <a href="">@<?=$model->tousername?></a>
                    <?php }?>
                <?=HtmlPurifier::process($model->content)?>
            </p>
            </div>
</div>

