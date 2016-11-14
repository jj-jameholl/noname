<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/6
 * Time: 下午12:23
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Comment;
use yii\widgets\Pjax;
$this->title = $article->article;
?>
<head>
    <link rel="stylesheet" href="/lovestory/markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" href="/lovestory/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
<link rel="stylesheet" href="/lovestory/font/dist/css/bootstrap.min.css">
<!--    <script type="text/javascript" src="/basic/webuploader-0.1.5/webuploader.js"></script>-->
<script src="../font/dist/js/bootstrap.js"></script>
    <script src="/lovestory/markdown/js/bootstrap-markdown.js"></script>
    <script src="/lovestory/markdown/locale/bootstrap-markdown.zh.js"></script>
    <style>
        .img{
            height:40px;
            width:40px;
            border-radius: 20px;
            border-collapse: separate;
            border:2px;

        }
        .img_comment{
            height:42px;
            width: 42px;px;
            border:#eee 1px solid;
            border-radius: 5px;
        }
        .img_comment_son{
            height:38px;
            width:38px;
            border:#eee 1px solid;
            border-radius: 5px;
        }
        .media-body{
            width:10000px;
        }
        </style>
</head>
<div class="container">
<div class="row">
    <div class="col-md-9">
        <ol class="breadcrumb">
        <li><a href="<?=Url::toRoute(['/article/index'])?>">首页</a></li>
        <li><a href="<?=Url::toRoute(['/article/index'])?>">文章列表</a></li>
        </ol>
        <div class="article">
        <div class="title">
        <h2><?=Html::encode($article->article)?></h2>
            <hr>
            <?php Pjax::begin(['id'=>'headinfo'])?>
            <div class="info">
                <img class="img" src="/lovestory/photo/<?=$user->photo?>"/>&nbsp;<?=$user->username?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-time"></span><?=date('Y-m-d :H:i:s',$article->created)?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-pencil" ></span><?='评论:'.Comment::count($article->id)?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-heart-empty" ></span>&nbsp;<?=$article->loves?>&nbsp;
            </div>
            <?php Pjax::end()?>
            <hr>
        </div>
            <div class="content">
            <?=HtmlPurifier::process($article->content);?>
            </div>
        </div>
        <hr>

<!--        <div class="media">-->
<!--            <a class="pull-left" href="#">-->
<!--                <img class="media-object" data-src="../views/layouts/2.jpg/45x45">-->
<!--            </a>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">Media heading</h4>-->
<!--                ...-->
<!---->
<!--                <!-- Nested media object -->
<!--                <div class="media">-->
<!--                    ...-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <ul class="media-list">-->
<!--            <li class="media">-->
<!--                <a class="media-left" href="#">-->
<!--                    <img class="img" src="../views/layouts/2.jpg">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <a5 class="media-heading">小超仔</a5>-->
<!--                    <br>-->
<!---->
<!--                    <p>我最萌!</p>-->
<!---->
<!--                    <!-- Nested media object -->
<!--                    <div class="media">-->
<!--                        <a class="media-left" href="#">-->
<!--                            <img class="media-object" data-src="holder.js/40x40">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">詹詹</h4>-->
<!--                            <p>试一下效果怎么样</p>-->
<!--                </div>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                    <div class="media">-->
<!--                        <a class="media-left" href="#">-->
<!--                            <img class="media-object" data-src="holder.js/40x40">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">猪仔</h4>-->
<!--                            <p>爱你么么哒!</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                 </div>-->
<!--            </li>-->
<!--        </ul>-->

        <?php
        echo $this->render('/comment/commentlist',[
            'id'=>$article->id
        ]);
        ?>
        <br>
        <br>
        <h4>小猪仔快说话!</h4>
        <hr>
        <?php
        $comment = new Comment();
        echo $this->render('/comment/content',[
            'model'=>$comment,
            'id'=>$article->id,]);
        ?>
<!--        --><?php
//        $comment = new Comment();
//        echo $this->render('/comment/_content',[
//            'model'=>$comment,
//        ]);
//        ?>
<!--        <form action='index.php?r=comment/create&article_id=3' method="get">-->
<!--            <textarea name="content" data-provide="markdown" data-savable="false" data-language="zh" rows="8"></textarea>-->
<!--            <br><button id="mark" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;提交</button>-->
<!--        </form>-->
<!--        <hr>-->
    </div>
</div>
</div>
</div>

