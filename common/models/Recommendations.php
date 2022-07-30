<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recommendations".
 *
 * @property int $id
 * @property int|null $news_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property News $news
 */
class Recommendations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recommendations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['news_id', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
