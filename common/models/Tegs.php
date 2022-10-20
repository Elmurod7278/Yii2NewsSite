<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tegs".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_en
 * @property int $created_at
 * @property int $updated_at
 *
 * @property NewsTeg[] $newsTegs
 */
class Tegs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => date('Y-m-d H:i:s')
            ],
        ];
    }
    public static function tableName()
    {
        return 'tegs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'integer'],
            [['name_uz', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'name_en' => 'Name En',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[NewsTegs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTegs()
    {
        return $this->hasMany(NewsTeg::className(), ['teg_id' => 'id']);
    }
}
