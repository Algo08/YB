<?php

Namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $text
 * @property string $text_uz
 * @property string $text_ru
 * @property string $text_en
 * @property string $image_location
 * @property string $video_url
 */
class Video extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tabletext()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_uz', 'text_ru', 'text_en', 'image_location', 'video_url'], 'required'],
            [['text_uz', 'text_ru', 'text_en', 'image_location'], 'string', 'max' => 100],
            [['video_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'text_uz' => 'Text Uz',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'image_location' => 'Image Location',
            'video_url' => 'Video Url',
        ];
    }

    /**
     * @return string
     */
    public function getText(){
        switch (Yii::$app->language){
            case 'ru': return $this->text_ru == null ? $this->text_uz : $this->text_ru ;break;
            case 'en': return $this->text_en == null ? $this->text_uz : $this->text_en ;break;
            default   : return $this->text_uz;break;
        }
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->imageFile) {
            $this->imageFile->saveAs('../../frontend/web/img/video_img/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            Image::crop(Yii::getAlias('@webroot') .'/../../frontend/web/img/video_img/'. $this->imageFile->baseName . '.' . $this->imageFile->extension,378,225)
                ->save(Yii::getAlias('../../frontend/web/img/video_img/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension), ['quality' => 90]);

            unlink(Yii::getAlias('@webroot') .'/../../frontend/web/img/video_img/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            if ($this->image_location && is_file(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location)){
                unlink(Yii::getAlias('@webroot').'/../../frontend/web'.$this->image_location);
            }
            $this->image_location = '/img/video_img/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }

}
