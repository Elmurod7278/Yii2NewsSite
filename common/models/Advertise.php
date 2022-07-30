<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "advertise".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 */
class Advertise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
    public function upload_file()
    {
        $image = UploadedFile::getInstance($this, 'image');
        $temp_path = Yii::getAlias('@storage/advertise/') . $image->name;
        $image->saveAs($temp_path);
        $this->image=$image->name;
        return $this->save();
    }
}
