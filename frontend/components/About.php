<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class About extends Widget
{
    public function run()
    {
        $about = \common\models\About::find()->all();
        return $this->render('about',['about'=>$about]);
    }

}