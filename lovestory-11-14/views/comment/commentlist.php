<?php
use yii\widgets\Pjax;
use yii\widgets\ListView;
use app\models\Comment;

/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/11
 * Time: 下午7:06
 */
?>
<?php $model = new Comment();?>
<?php Pjax::begin(['id'=>'comments','enablePushState' =>true,'options'=>['data-pjax'=>true]])?>
<?=ListView::widget([
    'id'=>'comment',
    'dataProvider'=>$model->search($id),
    'itemView'=>'/article/_comment',
    'layout'=>'{items}{pager}',
//    'pager'=>[
//        'maxButtonCount'=>10,
//        'nextPageLabel'=>Yii::t('app','》'),
//        'prevPageLabel'=>Yii::t('app','《'),
//    ],

]);?>
<div class="comment-form hidden">
    <?php
    $comment = new Comment();
    echo $this->render('/comment/_content',[
        'model'=>$comment,
        'id'=>$id,
    ]);
    ?>
</div>
<?php Pjax::end()?>

