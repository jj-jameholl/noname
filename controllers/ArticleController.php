<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/10/30
 * Time: 上午11:13
 */
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\IdentityInterface;
use app\models\User;
use app\models\Article;


use yii\web\Controller;

class ArticleController extends Controller{
    public $enableCsrfValidation = false;

    public function behaviors(){
        return [
           // 'access'=>[
              //  'class'=>AccessControl::className(),
              //  'only'=>['index'],
             //   'rules'=>[
               //     'actions' => ['index'],
             //       'allow' => true,
           //         'roles' => ['@'],
         //       ],
       //     ]
		   	'access' => [
            'class' => AccessControl::className(),
            'only' => ['index', 'create'],
            'rules' => [
                // 允许认证用户
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // 默认禁止其他用户
            ],
        ],
        ];
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
        $model = new Article();
        if($model->load(Yii::$app->request->post())){
            $model->last_edit = $model->created = time()+8*3600;
            $model->writer = Yii::$app->user->identity->username;
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
	return $this->redirect(['article/index']);
        }
        return $this->render('create',['model'=>$model]);
    }
    public function actionIndex(){
        $model = new Article();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        return $this->render('index',['model'=>$model,'dataProvider'=>$dataProvider]);
    }
    public function actionDetail($id){
           $article = Article::find()->where(['id'=>$id])->one();
            $user = User::find()->where(['username'=>$article->writer])->one();
        return $this->render('detail',['article'=>$article,'user'=>$user]);
    }
}
