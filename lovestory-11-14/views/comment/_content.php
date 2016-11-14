<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJs(
    '$("document").ready(function(){
//        $("#commentone").on("pjax:end", function() {
//             //$.pjax.reload({container:"#comments"});  //Reload GridView
//        });
            $("#submit").click(function(){
            $.ajax({
                url:"'.Url::toRoute(["/comment/createson"]).'",
                data:{"content":$(this).parent().find("textarea").val(),"article_id":'.$id.',"id":$(this).parent().find("input").filter(".input2").val(),"tousername":$(this).parent().find("input").filter(".input1").val()},
                success:function(data){
                    if(data==1){
                    $.pjax.reload({container:"#comments"});
                    }
                    else{
                    alert("error");
                    }
                }
            });
            });
    });'
);
?>
<?php $form = ActiveForm::begin([
    'id'=>'tryit',
    'action' => ['comment/createson','article_id'=>$id],
    'method'=>'post',
    'options'=>['data-pjax'=>'true'],
]); ?>
<?=$form->field($model,'content')->textarea(['rows'=>2])->label("");?>
<input type="hidden" class="input1"name="tousername">
<input type="hidden" class="input2" name="id">
<input type="button" class="btn btn-success" id="submit" value="提交">
<?php ActiveForm::end()?>
