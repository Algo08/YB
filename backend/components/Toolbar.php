<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Toolbar extends Widget
{
    public function run()
    {
        $model = \common\models\Contact::find()->where(['read'=>0])->orderBy(['date'=>SORT_DESC])->all();
        $countMess = count($model);
        return $this->render('toolbar',['models'=>$model,'countMess'=>$countMess]);
    }

}