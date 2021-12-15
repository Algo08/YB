<?php

namespace common\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $email
 * @property string $full_name
 * @property string $text
 * @property string $date
 * @property string $number
 * @property int $read
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'full_name', 'text', 'number',], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['number'], PhoneInputValidator::className(), 'region' => ['UZ']],
            [['read'], 'integer'],
            [['email'], 'email'],
            [['email', 'full_name'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'email' => Yii::t('main', 'Email'),
            'full_name' => Yii::t('main', 'To‘liq ism'),
            'text' => Yii::t('main', 'Xabar'),
            'date' => Yii::t('main', 'Date'),
            'number' => Yii::t('main', 'Telefon raqam'),
            'read' => Yii::t('main', 'Read'),
        ];
    }

    public function beforeSave($insert) {
        if ($insert) {
            $this->date= date('Y-m-d H:i:s');
        }    
        return parent::beforeSave($insert);

    }
}