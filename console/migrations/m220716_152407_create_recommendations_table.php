<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recommendations}}`.
 */
class m220716_152407_create_recommendations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recommendations}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_recommendatins_news_id','recommendations','news_id','news','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recommendations}}');
    }
}
