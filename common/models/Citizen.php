<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "citizen".
 *
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 * @property string|null $lastname_latin
 * @property string|null $firstname_latin
 * @property string|null $middlename_latin
 * @property string|null $lastname_uzbek
 * @property string|null $firstname_uzbek
 * @property string|null $middlename_uzbek
 * @property string $birth_date
 * @property int $birth_place
 * @property int $citizenship
 * @property int $marital_status
 * @property int $passport_id
 * @property int $current_country
 * @property int $current_region
 * @property int $current_district
 * @property string|null $current_full_address
 * @property int $registration_country
 * @property int $registration_region
 * @property int $registration_district
 * @property string $registration_full_address
 * @property string|null $additional_info
 * @property string $full_name
 * @property int $status
 * @property int $appeal_id
 * @property Passport $pASSPORT
 * @property Appeal $aPPEAL
 * @property Region $cURRENTREGION
 * @property District $cURRENTDISTRICT
 * @property Assistance[] $aSSISTANCE
 */
class Citizen extends \yii\db\ActiveRecord
{
    const STATUS_VICTIMS = 1;
    const STATUS_PERPETRATOR = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'citizen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'middlename', 'birth_date', 'birth_place', 'citizenship', 'marital_status', 'current_country', 'current_region', 'current_district', 'registration_country', 'registration_region', 'registration_district', 'registration_full_address'], 'required'],
            [['birth_date'], 'safe'],
            [['birth_place', 'citizenship', 'marital_status', 'gender', 'passport_id', 'current_country', 'current_region', 'current_district', 'registration_country', 'registration_region', 'registration_district', 'status', 'appeal_id'], 'integer'],
            [['current_full_address', 'registration_full_address', 'additional_info'], 'string'],
            [['lastname', 'firstname', 'middlename', 'lastname_latin', 'firstname_latin', 'middlename_latin', 'lastname_uzbek', 'firstname_uzbek', 'middlename_uzbek'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'lastname' => Yii::t('main', 'Фамилия').'*',
            'firstname' => Yii::t('main', 'Имя').'*',
            'middlename' => Yii::t('main', 'Отчество').'*',
            'lastname_latin' => Yii::t('main', 'Фамилия латинская'),
            'firstname_latin' => Yii::t('main', 'Имя латинская'),
            'middlename_latin' => Yii::t('main', 'Отчество латинская'),
            'lastname_uzbek' => Yii::t('main', 'Фамилия Узбек'),
            'firstname_uzbek' => Yii::t('main', 'Имя Узбек'),
            'middlename_uzbek' => Yii::t('main', 'Отчество Узбек'),
            'birth_date' => Yii::t('main', 'День рождения').'*',
            'birth_place' => Yii::t('main', 'Место рождения').'*',
            'citizenship' => Yii::t('main', 'Гражданство'),
            'marital_status' => Yii::t('main', 'Семейное положение'),
            'gender' => Yii::t('main', 'Пол'),
            'passport_id' => Yii::t('main', 'Passport ID'),
            'current_country' => Yii::t('main', 'Текущая страна').'*',
            'current_region' => Yii::t('main', 'Текущий регион').'*',
            'current_district' => Yii::t('main', 'Текущий район').'*',
            'current_full_address' => Yii::t('main', 'Текущий полный адрес').'*',
            'registration_country' => Yii::t('main', 'Страна регистрации').'*',
            'registration_region' => Yii::t('main', 'Регион регистрации').'*',
            'registration_district' => Yii::t('main', 'Регистрационный округ').'*',
            'registration_full_address' => Yii::t('main', 'Полный адрес регистрации').'*',
            'additional_info' => Yii::t('main', 'Additional Info'),
            'status' => Yii::t('main', 'Статус'),
            'appeal_id' => Yii::t('main', 'Appeal Id'),
            'pASSPORT' => Yii::t('main', 'Пасспорт'),
            'aPPEAL' => Yii::t('main', 'Обращения'),
            'cURRENTREGION' => Yii::t('main', 'Текущий регион'),
            'cURRENTDISTRICT' => Yii::t('main', 'Текущий район'),
            'full_name' => Yii::t('main', 'Full name'),
            'aSSISTANCE' => Yii::t('main', 'ASSISTANCE'),
        ];
    }
    public function getFull_name()
    {
        return $this->lastname.' '.$this->firstname;
    }

    public function getPASSPORT()
    {
        return $this->hasOne(Passport::className(), ['id' => 'passport_id']);
    }


    public function getAPPEAL()
    {
        return $this->hasOne(Appeal::className(), ['id' => 'appeal_id']);
    }

    public function getCURRENTREGION()
    {
        return $this->hasOne(Region::className(), ['id' => 'current_region']);
    }

    public function getCURRENTDISTRICT()
    {
        return $this->hasOne(District::className(), ['id' => 'current_district']);
    }

    public function getASSISTANCE()
    {
        return $this->hasMany(Assistance::className(), ['victim_id' => 'id'])->orderBy(['create_at' => SORT_DESC]);
    }

}
