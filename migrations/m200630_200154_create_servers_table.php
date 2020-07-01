<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servers}}`.
 */
class m200630_200154_create_servers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%servers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'tarif' => $this->string(),
            'date' => $this->dateTime()->defaultValue( date("Y-m-d H:i:s", time()))
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%servers}}');
    }
}
