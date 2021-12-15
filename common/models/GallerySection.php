<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_section".
 *
 * @property int $id
 * @property string $name
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $status
 */
class GallerySection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'status'], 'required'],
            [['status'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'name_uz' => Yii::t('main', 'Name Uz'),
            'name_ru' => Yii::t('main', 'Name Ru'),
            'name_en' => Yii::t('main', 'Name En'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    /**
     * @return string
     */
    public function getName(){
        switch (Yii::$app->language){
            case 'ru': return $this->name_ru == null ? $this->name_uz : $this->name_ru ;break;
            case 'en': return $this->name_en == null ? $this->name_uz : $this->name_en ;break;
            default   : return $this->name_uz;break;
        }
    }
}
