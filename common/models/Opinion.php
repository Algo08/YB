<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "opinion".
 *
 * @property int $id
 * @property string $name
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $text
 * @property string $text_uz
 * @property string $text_ru
 * @property string $text_en
 */
class Opinion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opinion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'text_uz', 'text_ru', 'text_en'], 'required'],
            [['id'], 'integer'],
            [['text_uz', 'text_ru', 'text_en'], 'string'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 50],
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
            'text' => Yii::t('main', 'Text'),
            'text_uz' => Yii::t('main', 'Text Uz'),
            'text_ru' => Yii::t('main', 'Text Ru'),
            'text_en' => Yii::t('main', 'Text En'),
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
}
