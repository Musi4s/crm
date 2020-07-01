<?php
namespace app\modules\admin\controllers;

use app\models\Server;

class ListController extends AdminController {
    public function actionServers() 
    {
        return $this->render('server', [
            'servers' => Server::find()->all(),
            'countServer' => Server::find()->count(),
        ]);
    }
}