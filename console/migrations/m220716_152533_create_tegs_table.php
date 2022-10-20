<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tegs}}`.
 */
class m220716_152533_create_tegs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tegs}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(),
            'name_en' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tegs}}');
    }
}
