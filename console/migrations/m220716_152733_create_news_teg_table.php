<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_teg}}`.
 */
class m220716_152733_create_news_teg_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_teg}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'teg_id' => $this->integer(),

        ]);
        $this->addForeignKey('fk_news_teg_news_id','news_teg','news_id','news','id',
        'CASCADE');
        $this->addForeignKey('fk_news_teg_teg_id','news_teg','teg_id','tegs','id',
            'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_teg}}');
    }
}
