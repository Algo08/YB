<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Statistics extends Widget
{
    public function run()
    {
        $statistics = \common\models\Statistics::find()->all();
        return $this->render('statistics',['statistics'=>$statistics]);
    }

}