<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assistance".
 *
 * @property int $id
 * @property int $victim_id
 * @property int $type
 * @property string $description
 * @property string $create_at
 * @property Citizen $victim
 */
class Assistance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assistance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'description'], 'required'],
            [['create_at'], 'safe'],
            [['victim_id', 'type'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'victim_id' => Yii::t('main', 'Victim ID'),
            'type' => Yii::t('main', 'Type'),
            'description' => Yii::t('main', 'Описание'),
            'create_at' => Yii::t('main', 'Create date'),
            'victim' => Yii::t('main', 'Victim'),
        ];
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert) {
        $this->create_at=date('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }

    public function getVictim()
    {
        return $this->hasOne(Citizen::className(), ['id' => 'victim_id']);
    }

}
