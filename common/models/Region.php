<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $deleted
 * @property int $cOUNT
 * @property int $dISTRICT
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'deleted'], 'required'],
            [['deleted'], 'integer'],
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
            'name_uz' => Yii::t('main', 'Регион').' Uz',
            'name_ru' => Yii::t('main', 'Регион').' Ru',
            'name_en' => Yii::t('main', 'Регион').' En',
            'deleted' => Yii::t('main', 'Deleted'),
            'cOUNT' => Yii::t('main', 'Count'),
            'rEGIONS' => Yii::t('main', 'Count'),
        ];
    }

    public function getCOUNT()
    {
        return District::find()->where(['region_id'=>$this->id])->count();
    }

    public function getDISTRICT()
    {
        return $this->hasMany(District::className(), ['region_id' => 'id']);
    }
}
