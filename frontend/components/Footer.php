<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Footer extends Widget
{
    public function run()
    {
        $address = \common\models\Address::find()->one();
        return $this->render('footer',['address'=>$address]);
    }

}