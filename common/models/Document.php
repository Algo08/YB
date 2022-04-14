<?php

namespace common\models;

use phpDocumentor\Reflection\File;
use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property int $appeal_id
 * @property string|null $description
 * @property string $file_location
 * @property string $size
 * @property string $name
 * @property File $file[]
 * @property Appeal $aPPEAL

 */
class Document extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'name', 'size'], 'string'],
            [['file_location'], 'required'],
            [['appeal_id'], 'integer'],
            [['file_location'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'description' => Yii::t('main', 'Описание'),
            'name' => Yii::t('main', 'Название файла'),
            'file_location' => Yii::t('main', 'File Location'),
            'appeal_id' => Yii::t('main', 'Appeal Id'),
            'size' => Yii::t('main', 'Размер'),
            'aPPEAL' => Yii::t('main', 'Appeal'),
        ];
    }

    public function getAPPEAL()
    {
        return $this->hasOne(Appeal::className(), ['id' => 'appeal_id']);
    }
}
