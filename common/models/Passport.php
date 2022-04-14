<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "passport".
 *
 * @property int $id
 * @property int $PINFL
 * @property string $series
 * @property int $number
 * @property string $issue_date
 * @property string $expire_date
 * @property string $issue_place
 * @property string $passport
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PINFL', 'series', 'number', 'issue_date', 'expire_date', 'issue_place'], 'required'],
            [['PINFL', 'number'], 'integer'],
            [['issue_date', 'expire_date'], 'safe'],
            [['series'], 'string', 'max' => 2],
            ['series', 'filter', 'filter' => 'ucfirst'],
            [['issue_place'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'PINFL' => Yii::t('main','ПИНФЛ').'*',
            'series' => Yii::t('main','Серия').'*',
            'number' => Yii::t('main','Номер').'*',
            'issue_date' => Yii::t('main','Дата выдачи паспорта').'*',
            'expire_date' => Yii::t('main','Дата истечения').'*',
            'issue_place' => Yii::t('main','Место выдачи паспорта').'*',
            'passport' => Yii::t('main','Пасспорт'),
        ];
    }

    public function getPassport()
    {
        return $this->series.' '.$this->number;
    }
}
