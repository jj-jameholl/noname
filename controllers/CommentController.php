<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/9
 * Time: 下午11:24
 */
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Comment;
error_reporting (E_ALL & ~E_NOTICE);
class CommentController extends Controller{
    public function behaviors()
    {
        return[];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionCreate(){
        $model = new Comment();
////        $model->content = $_POST['content'];
       $model->load(Yii::$app->request->post());
        $model->username = Yii::$app->user->identity->username;
        $model->user_id = Yii::$app->user->identity->id;
        $model->article_id = $_GET['id'];
        $model->createdTime = time()+8*3600;
        if($model->save()){
            return $this->renderAjax('/comment/content',['model'=>$model,'id'=>$model->article_id]);
        }
    }
    public function actionCreateson(){
        $model = new Comment();
//        $model->load(Yii::$app->request->post());
        $model->content = $_GET['content'];
        $model->username = Yii::$app->user->identity->username;
        $model->user_id = Yii::$app->user->identity->id;
//        $model->parent_id = $_POST['id'];
        $model->parent_id = $_GET['id'];
        if(isset($_GET['tousername'])){
            $model->tousername = $_GET['tousername'];
        }
        $model->createdTime = time()+8*3600;
        if($model->save()){
              //  echo "1232";
//            return $this->renderAjax('/comment/_content',['model'=>$model]);
//            return $this->renderAjax('commentlist',['id'=>$_GET['article_id']]);
            echo "1";

        }
        else{
            print_r($model);
        }
    }
}
