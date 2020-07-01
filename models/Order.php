<?php

namespace app\models;

use Yii;
use app\models\Tarif;

class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public static function getTarif($tarif)
    {
        $query = Tarif::find()->where(['code' => $tarif])->one();
        return $query['name'];
    }

    public static function getStatus($status)
    {
        $array = [
            'new' => 'Новый',
            'confirm' => 'Подтвержденный'
        ];

        return $array[$status];
    }

    public static function getNameTarif($tarif)
    {
        $array = [
            'win_lite' => 'Win-Lite',
            'win_a' => 'Win-A',
            'win_b' => 'Win-B'
        ];

        return $array[$tarif];
    }

    public function create()
    {
        return $this->save(false);
    }
}
