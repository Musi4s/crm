<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarifs}}`.
 */
class m200630_200206_create_tarifs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarifs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->string(),
            'price' => $this->integer()
        ]);

        Yii::$app->db->createCommand()->batchInsert('{{%tarifs}}', ['name', 'code', 'price'], [
            ['Win-Lite', 'win_lite', 178],
            ['Win-A', 'win_a', 499],
            ['Win-B', 'win_b', 1100]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarifs}}');
    }
}
