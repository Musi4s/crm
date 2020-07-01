<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegisterForm;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new RegisterForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->register())
            {
                $session = Yii::$app->session;
                $session->setFlash('successRegister', 'Регистрация прошла успешно! Теперь вы можете авторизоваться');
                return $this->redirect('/login');
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
