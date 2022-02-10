<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $section
 * @property string $image_location
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $sections;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'section', 'image_location'], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'section'], 'string', 'max' => 100],
            [['sections'], 'each'],
            [['image_location'], 'string', 'max' => 150],
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
            'section' => Yii::t('main', 'Section'),
            'image_location' => Yii::t('main', 'Image Location'),
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

    public function getCategoryDropdown()
    {
        $listCategory = GallerySection::find()
            ->where(['status' => true])
            ->all();
        $list = ArrayHelper::map( $listCategory,'id','name');

        return $list;
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->imageFile) {
            $this->imageFile->saveAs('../../frontend/web/img/gallery/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            // Image::crop(Yii::getAlias('@webroot') .'/../../frontend/web/img/gallery/'. $this->imageFile->baseName . '.' . $this->imageFile->extension,false,false)
            //     ->save(Yii::getAlias('../../frontend/web/img/gallery/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension), ['quality' => 90]);

            // unlink(Yii::getAlias('@webroot') .'/../../frontend/web/img/gallery/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            if ($this->image_location && is_file(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location)){
                unlink(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location);
            }
            $this->image_location = '/img/gallery/'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }

    public function getSectionsName()
    {
        $section = explode(",",$this->section);
        $name = '';
        $vergul = '';
        foreach ($section as $key => $value) {
            $name = $name.$vergul.GallerySection::findOne($value)->name;
            $vergul = ', ';
        }
        return $name;

    }
}
