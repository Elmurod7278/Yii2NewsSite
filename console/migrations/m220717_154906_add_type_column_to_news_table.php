<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%news}}`.
 */
class m220717_154906_add_type_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news','type','integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
