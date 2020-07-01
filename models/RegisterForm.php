<?php

namespace app\models;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    public $username;
    public $login;
    public $password;
    
    public function rules()
    {
        return [
            [
                ['username', 'login', 'password'], 
                'required',
                'message' => 'Поле {attribute} обязательно к заполнению'
            ],
            [
                ['username', 'login'], 
                'string'
            ],
            [
                ['login'], 
                'email',
                'message' => 'Логином должен быть email адрес'
            ],
            [
                ['login'], 
                'unique', 
                'targetClass' => 'app\models\User', 
                'targetAttribute' => 'login', 
                'message' => 'Данный пользователь уже существует'
            ],
            [
                ['password'],
                'string',
                'min' => 8,
                'max' => 30,
                'tooShort' => 'Поле {attribute} должно содержать не более {min} символов',
                'tooLong' => 'Поле {attribute} должно содержать не более {max} символов'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'login' => 'Логин',
            'password' => 'Пароль'
        ];
    }
    
    public function register()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->isAdmin = 1;
            return $user->create();
        }
    }
}
