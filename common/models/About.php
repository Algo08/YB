<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $head_text_uz
 * @property string|null $head_text_ru
 * @property string|null $head_text_en
 * @property string $part_text_uz
 * @property string|null $part_text_ru
 * @property string|null $part_text_en
 * @property string $main_text_uz
 * @property string|null $main_text_ru
 * @property string|null $main_text_en
 * @property int $image_location
 */
class About extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['head_text_uz', 'part_text_uz', 'main_text_uz', 'image_location'], 'required'],
            [['main_text_uz', 'main_text_ru', 'main_text_en'], 'string'],
            [['head_text_uz', 'head_text_ru', 'head_text_en'], 'string', 'max' => 100],
            [['image_location'], 'string', 'max' => 200],
            [['part_text_uz', 'part_text_ru', 'part_text_en'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'head_text' => Yii::t('main', 'Head Text'),
            'head_text_uz' => Yii::t('main', 'Head Text Uz'),
            'head_text_ru' => Yii::t('main', 'Head Text Ru'),
            'head_text_en' => Yii::t('main', 'Head Text En'),
            'part_text' => Yii::t('main', 'Part Text'),
            'part_text_uz' => Yii::t('main', 'Part Text Uz'),
            'part_text_ru' => Yii::t('main', 'Part Text Ru'),
            'part_text_en' => Yii::t('main', 'Part Text En'),
            'main_text' => Yii::t('main', 'Main Text'),
            'main_text_uz' => Yii::t('main', 'Main Text Uz'),
            'main_text_ru' => Yii::t('main', 'Main Text Ru'),
            'main_text_en' => Yii::t('main', 'Main Text En'),
            'image_location' => Yii::t('main', 'Image Location'),
        ];
    }

    /** 
     * @return string
     */
    public function getHead_text(){
        switch (Yii::$app->language){
            case 'ru': return $this->head_text_ru == null ? $this->head_text_uz : $this->head_text_ru ;break;
            case 'en': return $this->head_text_en == null ? $this->head_text_uz : $this->head_text_en ;break;
            default   : return $this->head_text_uz;break;
        }
    }

    /** 
     * @return string
     */
    public function getPart_text(){
        switch (Yii::$app->language){
            case 'ru': return $this->part_text_ru == null ? $this->part_text_uz : $this->part_text_ru ;break;
            case 'en': return $this->part_text_en == null ? $this->part_text_uz : $this->part_text_en ;break;
            default   : return $this->part_text_uz;break;
        }
    }

    /** 
     * @return string
     */
    public function getMain_text(){
        switch (Yii::$app->language){
            case 'ru': return $this->main_text_ru == null ? $this->main_text_uz : $this->main_text_ru ;break;
            case 'en': return $this->main_text_en == null ? $this->main_text_uz : $this->main_text_en ;break;
            default   : return $this->main_text_uz;break;
        }
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->imageFile) {
            $this->imageFile->saveAs('../../frontend/web/img/about/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            Image::crop(Yii::getAlias('@webroot') .'/../../frontend/web/img/about/'. $this->imageFile->baseName . '.' . $this->imageFile->extension,300,300)
                ->save(Yii::getAlias('../../frontend/web/img/about/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension), ['quality' => 90]);

            unlink(Yii::getAlias('@webroot') .'/../../frontend/web/img/about/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            if ($this->image_location && is_file(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location)){
                unlink(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location);
            }
            $this->image_location = '/img/about/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }
}
