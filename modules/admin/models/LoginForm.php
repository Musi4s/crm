<?php
namespace app\modules\admin\models;

use yii\base\Model;

class LoginForm extends Model {

    public $login;
    public $password;

    public function rules() {
        return [
            [
                ['login', 'password'], 
                'trim'
            ],
            [
                ['login', 'password'],
                'required',
                'message' => 'Это поле обязательно для заполнения'
            ],
            [
                ['password'], 
                'string', 
                'min' => 8,
                'max' => 30,
                'tooShort' => 'Поле {attribute} должно быть не менее {min} символов',
                'tooLong' => 'Поле {attribute} должно быть не более {max} символов'
            ],
        ];
    }

    public function attributeLabels() {
        return [
            'login' => 'Логин администратора',
            'password' => 'Пароль',
        ];
    }

    public static function login() {
        $session = \Yii::$app->session;
        $session->open();
        $session->set('auth_site_admin', true);
    }

    public static function logout() {
        $session = \Yii::$app->session;
        $session->open();
        if ($session->has('auth_site_admin')) {
            $session->remove('auth_site_admin');
        }
    }
}