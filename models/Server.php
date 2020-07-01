<?php

namespace app\models;

use Yii;

class Server extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servers';
    }
}
