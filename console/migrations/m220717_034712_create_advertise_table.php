<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advertise}}`.
 */
class m220717_034712_create_advertise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advertise}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%advertise}}');
    }
}
