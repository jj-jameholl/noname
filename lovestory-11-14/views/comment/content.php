<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\markdown\MarkdownEditor;
use app\assets\AppAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJs(
    '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {
           $.pjax.reload({container:"#comments"});  //Reload GridView
         });
    });'
);
?>
<?php Pjax::begin(['id'=>'new_comment','enablePushState' => false,'linkSelector'=>false,'options'=>['data-pjax'=>true]])?>
<?php $form = ActiveForm::begin([
    'action' => ['comment/create','id' => $id],
    'method'=>'post',
    'options'=>['data-pjax'=>true],
]); ?>
<?= $form->field($model,'content')->widget('yidashi\markdown\Markdown',['language' => 'zh'])->label(""); ?>
<?= Html::submitButton('提交',['class'=>'btn btn-success'])?>
<hr>
<?php ActiveForm::end()?>
<?php Pjax::end()?>
