<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $tel
 * @property string $photo
 * @property string $authKey
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey'], 'required'],
            [['username', 'photo', 'authKey'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 15],
            [['tel'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'tel' => 'Tel',
            'photo' => 'Photo',
            'authKey' => 'Auth Key',
        ];
    }
    public static function findIdentity($id)
    {
        return self::find()->where(['id'=>$id])->one();
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }
    public static function findByUsername($username)
    {
        return null;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        $user = self::find()->where(['username'=>$this->username])->one();
        return $user->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return true;
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
