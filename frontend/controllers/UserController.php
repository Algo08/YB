<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

     public function behaviors()
    {
        $behaviors = parent::behaviors();

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
            ],
        ];
        $behaviors['formats'] = [

            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
//        $behaviors['authenticator'] = [
//            'class' => HttpBasicAuth::className(),
//        ];

        return $behaviors;
    }
}
