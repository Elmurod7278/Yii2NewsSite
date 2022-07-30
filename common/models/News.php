<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $desc_uz
 * @property string|null $desc_en
 * @property string|null $body_uz
 * @property string|null $body_en
 * @property string|null $image
 * @property string|null $video
 * @property int|null $views_count
 * @property int|null $category_id
 * @property int|null $region_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Categories $category
 * @property NewsTeg[] $newsTegs
 * @property Recommendations[] $recommendations
 * @property Regions $region
 */
class News extends \yii\db\ActiveRecord
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
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc_uz', 'desc_en'], 'string'],
            [['views_count', 'category_id', 'region_id'], 'default', 'value' => null],
            [['views_count', 'category_id', 'region_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['title_uz', 'title_en', 'body_uz', 'body_en', 'video'], 'string', 'max' => 255],
            ['video','safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'desc_uz' => 'Desc Uz',
            'desc_en' => 'Desc En',
            'body_uz' => 'Body Uz',
            'body_en' => 'Body En',
            'image' => 'Image',
            'type'=>'Is Video',
            'video' => 'Video',
            'views_count' => 'Views Count',
            'category_id' => 'Category',
            'region_id' => 'Region',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[NewsTegs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTegs()
    {
        return $this->hasMany(NewsTeg::className(), ['news_id' => 'id']);
    }

    /**
     * Gets query for [[Recommendations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecommendations()
    {
        return $this->hasMany(Recommendations::className(), ['news_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    public function upload_file()
    {
        $image = UploadedFile::getInstance($this, 'image');
        $temp_path = Yii::getAlias('@storage/data/') . $image->name;
        $image->saveAs($temp_path);
        $this->image=$image->name;
        return $this->save();
    }
}
