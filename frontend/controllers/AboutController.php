<?php

namespace frontend\controllers;

class AboutController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $about = \common\models\About::findOne($id);
        return $this->render('index',['about'=>$about]);
    }

}
