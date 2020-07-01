<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\LoginForm;

class AuthController extends Controller {

    public function actionLogin() {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if (Yii::$app->params['adminLogin'] == $model->login
                    && Yii::$app->params['adminPassword'] == $model->password) {
                    LoginForm::login();
                    return $this->redirect('/admin');
                } else {
                    return $this->refresh();
                }
            }
        }
        return $this->render('login', ['model' => $model]);;
    }

    public function actionLogout() {
        LoginForm::logout();
        return $this->redirect('/admin/auth/login');
    }
}