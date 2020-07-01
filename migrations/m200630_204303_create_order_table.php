<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m200630_204303_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'tarif' => $this->string(),
            'date' => $this->dateTime()->defaultValue( date("Y-m-d H:i:s", time())),
            'status' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
