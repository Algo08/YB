<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Opinion extends Widget
{
    public function run()
    {
        $opinion = \common\models\Opinion::find()->all();
        return $this->render('opinion',['opinions'=>$opinion]);
    }

}