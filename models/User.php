<?php

namespace app\models;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
   /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByLogin($login)
    {
        return User::find()->where(['login' => $login])->one();
    }

    public function create()
    {
        return $this->save(false);
    }
}
