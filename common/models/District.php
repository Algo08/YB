<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string $name_ru
 * @property string|null $name_en
 * @property int $region_id
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name_uz' => Yii::t('main', 'Район').' Uz',
            'name_ru' => Yii::t('main', 'Район').' Ru',
            'name_en' => Yii::t('main', 'Район').' En',
            'region_id' => Yii::t('main', 'Region ID'),
        ];
    }
}
