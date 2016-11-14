<?php
namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use yii\Helpers\Html;
/**
 * This is the model class for table "Article".
 *
 * @property integer $id
 * @property string $article
 * @property string $content
 * @property string $writer
 * @property integer $status
 * @property string $tag
 * @property string $created
 * @property string $last_edit
 * @property integer $user_id
 * @property integer $loves
 * @property integer $word-num
 * @property integer $click
 * @property integer $up
 * @property integer $down
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article', 'content', 'writer', 'status', 'tag', 'created', 'last_edit', 'user_id'], 'required'],
            [['content'], 'string'],
            [['status', 'user_id', 'loves', 'word-num', 'click', 'up', 'down','comments'], 'integer'],
            [['created', 'last_edit'], 'safe'],
            [['article'], 'string', 'max' => 30],
            [['writer', 'tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => '',
            'content' => '',
            'writer' => 'Writer',
            'status' => 'Status',
            'tag' => 'Tag',
            'created' => 'Created',
            'last_edit' => 'Last Edit',
            'user_id' => 'User ID',
            'loves' => 'Loves',
            'word-num' => 'Word Num',
            'click' => 'Click',
            'up' => 'Up',
            'down' => 'Down',
            'comments'=> '',
        ];
    }
    public function search($params){
        $query = self::find()->orderBy('id DESC');
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>8
            ]
        ]);
        $this->load($params);
        $query->andFilterWhere([
            'id'=>$this->id,
            'status'=>$this->status,
            'created'=>$this->created,
        ]);
        $query->andFilterWhere(['like','writer',$this->writer])
                ->andFilterWhere(['like','article',$this->article])
                ->andFilterWhere(['like','tag',$this->tag])
                ->andFilterWhere(['like','content',$this->content]);
        return $dataProvider;
    }
    public function getUrl(){
        return Yii::$app->urlManager->createUrl([
            '/article/detail','id'=>$this->id,'article'=>$this->article,
        ]);
    }
/*    public function getTagLinks()
    {
        $links=array();
        foreach(Tag::string2array($this->tag) as $tag)
            $links[]=Html::a(Html::encode($tag), array('post/index', 'tag'=>$tag));
        return $links;
    }*/
}

