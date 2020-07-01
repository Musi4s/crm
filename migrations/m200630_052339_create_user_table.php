<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200630_052339_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'login' => $this->string(),
            'password' => $this->string(),
            'isAdmin' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
