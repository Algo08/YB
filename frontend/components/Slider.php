<?php
namespace app\components;
use yii\base\Widget;
/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Slider extends Widget
{
    public function run()
    {
        $sliders = \common\models\Slider::find()->all();
        return $this->render('slider',['sliders'=>$sliders]);
    }

}