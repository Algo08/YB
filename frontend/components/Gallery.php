<?php
namespace app\components;
use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: AGC PROJECTS
 * Date: 11.06.2019
 * Time: 14:28
 */

class Gallery extends Widget
{
    public function run()
    {
        $galleries = \common\models\Gallery::find()->all();
        $sections = \common\models\GallerySection::find()->where(['status' => true])->all();
        return $this->render('gallery',['galleries'=>$galleries, 'sections' => $sections]);
    }

}