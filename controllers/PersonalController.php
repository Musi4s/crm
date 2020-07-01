<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Server;
use app\models\Order;
use app\models\Tarif;

class PersonalController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index', [
            'servers' => Server::find()->all(),
            'countServer' => Server::find()->count(),
            'countOrder' => Order::find()->where('user_id = :id', [':id' => Yii::$app->user->identity->id])->count(),
            'orders' => Order::find()->where('user_id = :id', [':id' => Yii::$app->user->identity->id])->all()
        ]);
    }

    public function actionTarifs()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('tarifs', [
            'tarifs' => Tarif::find()->all()
        ]);
    }

    public function actionOrder()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $code = Yii::$app->request->get('code') ? Yii::$app->request->get('code') : null; 
        if (Tarif::countTarif($code) < 1) {
            $session = Yii::$app->session;
            $session->setFlash('errorTarif', 'Такого тарифа не существует');
            return $this->redirect('/personal/tarifs');
        }

        $order = new Order;
        $order->user_id = Yii::$app->user->identity->id;
        $order->tarif = $code;
        $order->date = date("Y-m-d H:i:s", time());
        $order->status = 'new';

        if ($order->create()) {
            return $this->goHome();
        }
    }
    
}
