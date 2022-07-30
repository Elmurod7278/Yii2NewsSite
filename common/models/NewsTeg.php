<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "news_teg".
 *
 * @property int $id
 * @property int|null $news_id
 * @property int|null $teg_id
 *
 * @property News $news
 * @property Tegs $teg
 */
class NewsTeg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_teg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'teg_id'], 'default', 'value' => null],
            [['news_id', 'teg_id'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
            [['teg_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tegs::className(), 'targetAttribute' => ['teg_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'news_id' => Yii::t('app', 'News ID'),
            'teg_id' => Yii::t('app', 'Teg ID'),
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

    /**
     * Gets query for [[Teg]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeg()
    {
        return $this->hasOne(Tegs::className(), ['id' => 'teg_id']);
    }

}
