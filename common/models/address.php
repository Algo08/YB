<?php

namespace common\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $phone
 * @property string $address
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $location
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'address_uz', 'location'], 'required'],
            [['address_uz', 'address_ru', 'address_en'], 'string', 'max' => 150],
            [['phone'], PhoneInputValidator::className(), 'region' => ['UZ']],
            [['location'], 'string'],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'address_uz' => 'Address Uz',
            'address_ru' => 'Address Ru',
            'address_en' => 'Address En',
            'address' => 'Address',
            'location' => 'Location',
        ];
    }

    /**
     * @return string
     */
    public function getAddress(){
        switch (Yii::$app->language){
            case 'ru': return $this->address_ru == null ? $this->address_uz : $this->address_ru ;break;
            case 'en': return $this->address_en == null ? $this->address_uz : $this->address_en ;break;
            default   : return $this->address_uz;break;
        }
    }
}
