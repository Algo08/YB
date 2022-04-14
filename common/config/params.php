<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'geostudyuz@gmail.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'bsVersion' => '5.x',

    'country' => [
        '1'=>'Узбекистан',
    ],

    'cryme_type'=>[
        '1' => 'Sex exploatation',
        '2' => 'Labor exploatation',
        '3' => 'Organ transplantation',
        '4' => 'Baby trading'
    ],

    'materialStatus' => [
        '1'=>'Married',
        '2'=>'Single',
        '3'=>'Divorced',
        '4'=>'Separately',
        '5'=>'Cohobitants',
        '6'=>'Widows'
    ],

    'gender' => [
        '1'=>'Male',
        '2'=>'Female',
    ],

    'status' => [
        '1' => Yii::t('main','Новое'),
        '2' => Yii::t('main','Обработке'),
        '3' => Yii::t('main','Архив')
    ],

    'assistance_type'=>[
        '1' => Yii::t('main','Помощь не предоставлена'),
        '2' => Yii::t('main','Юридическая помощь'),
        '3' => Yii::t('main','Материальная помощь'),
        '4' => Yii::t('main','Помощь с образованием'),
        '5' => Yii::t('main','Помощь с лечением')
    ]
];
