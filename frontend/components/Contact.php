<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Contact extends Widget
{
    public function run()
    {
        $model = new \common\models\Contact();
        return $this->render('contact',['model'=>$model]);
    }

}