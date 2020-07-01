<?php

namespace app\models;

use Yii;

class Tarif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarifs';
    }

    public static function countTarif($code)
    {
        return self::find()->where('code = :code', [':code' => $code])->count();
    }
}
