<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Order;
use app\models\User;
use app\models\Server;

class OrderController extends Controller {

    public function actionList()
    {
        $type = \Yii::$app->request->get('type') ? \Yii::$app->request->get('type') : null; 

        $array = [
            'new', 'confirm'
        ];

        if (!in_array($type, $array)) {
            return $this->redirect('/admin');
        }

        return $this->render('list', [
            'type' => $type,
            'countOrder' => Order::find()->where('status = :status', [':status' => $type])->count(),
            'orders' => Order::find()->where('status = :status', [':status' => $type])->all()
        ]);
    }

    public function actionStatus()
    {
        $id = \Yii::$app->request->get('id') ? \Yii::$app->request->get('id') : null;
        $type = \Yii::$app->request->get('type') ? \Yii::$app->request->get('type') : null;

        $count = Order::find()->where('id = :id', [':id' => $id])->andWhere('status = :status', [':status' => $type])->count();
        
        if ($count < 1) {
            return $this->redirect('/admin');
        } else {
            $order = Order::findOne($id);
            $order->status = 'confirm';
            $order->save();

            $server = new Server;
            $server->name = Order::getNameTarif($order['tarif']);
            $server->tarif = $order['tarif'];
            $server->date = date("Y-m-d H:i:s", time());
            $server->save();

            self::sendMail('example', 'Подтверждение заказа', ['paramOrderId' => $id, 'paramTarif' => Order::getNameTarif($order['tarif'])]);
            return $this->redirect('/admin/order/list?type=' . $type);
        }
    }

    public static function sendMail($view, $subject, $params = []) {
        \Yii::$app->mailer->getView()->params['userName'] = \Yii::$app->user->identity->username;

        $result = \Yii::$app->mailer->compose([
            'html' => 'views/' . $view . '-html',
            'text' => 'views/' . $view . '-text',
        ], $params)->setTo([\Yii::$app->user->identity->login])
            ->setSubject($subject)
            ->send();

        \Yii::$app->mailer->getView()->params['userName'] = null;
    }
}