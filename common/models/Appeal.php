<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "appeal".
 *
 * @property int $id
 * @property string $date
 * @property int $organization
 * @property int $cryme_type
 * @property int $responsible
 * @property int $country
 * @property int $region
 * @property int $district
 * @property int $status
 * @property int $creater_id
 * @property Organization $oRGANIZATION
 * @property User $rESPONSIBLE
 * @property Region $rEGION
 * @property District $dISTRICT
 * @property Citizen[] $vICTIMS
 */
class Appeal extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_INPROCCESS = 1;
    const STATUS_ARCHIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date','status','creater_id'], 'required'],
            [['date'], 'safe'],
            [['organization', 'cryme_type', 'responsible', 'country', 'region', 'district', 'status', 'creater_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'date' => Yii::t('main', 'Дата обращения'),
            'organization' => Yii::t('main', 'Организации'),
            'cryme_type' => Yii::t('main', 'Тип правонарушения'),
            'responsible' => Yii::t('main', 'Ответственный'),
            'country' => Yii::t('main', 'Cтрана'),
            'region' => Yii::t('main', 'Регион'),
            'district' => Yii::t('main', 'Район'),
            'status' => Yii::t('main', 'Статус'),
            'creater_id' => Yii::t('main', 'Creater'),
            'oRGANIZATION' => Yii::t('main', 'Organization name'),
            'rESPONSIBLE' => Yii::t('main', 'Responsible name'),
            'rEGION' => Yii::t('main', 'Region name'),
            'dISTRICT' => Yii::t('main', 'District name'),
            'vICTIMS' => Yii::t('main', 'Victims'),
        ];
    }
    public function getORGANIZATION()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization']);
    }
    public function getRESPONSIBLE()
    {
        return $this->hasOne(User::className(), ['id' => 'responsible']);
    }

    public function getREGION()
    {
        return $this->hasOne(Region::className(), ['id' => 'region']);
    }

    public function getDISTRICT()
    {
        return $this->hasOne(Region::className(), ['id' => 'district']);
    }


    public function getVICTIMS()
    {
        return $this->hasMany(Citizen::className(), ['appeal_id' => 'id'])->andOnCondition(['status'=>1]);
    }
}
