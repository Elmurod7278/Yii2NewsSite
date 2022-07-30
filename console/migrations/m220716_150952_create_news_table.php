<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220716_150952_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title_uz'=>$this->string(),
            'title_en'=>$this->string(),
            'desc_uz'=>$this->text(),
            'desc_en'=>$this->text(),
            'body_uz'=>$this->string(),
            'body_en'=>$this->string(),
            'image'=>$this->string(),
            'video'=>$this->string(),
            'views_count'=>$this->integer(),
            'category_id'=>$this->integer(),
            'region_id'=>$this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk-news_category_id','news','category_id','categories','id','CASCADE');
        $this->addForeignKey('fk-news_region_id','news','region_id','regions','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
