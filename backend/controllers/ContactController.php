<?php

namespace backend\controllers;

use \common\models\Contact;
use yii\data\ActiveDataProvider;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contact::find()
                ->orderBy(['date'=>SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('view', [
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionContact($id)
    {
        $contact = Contact::findOne($id);
        return $this->renderAjax('Contact',['contact'=>$contact]);
    }

    public function actionReaded($id)
    {
        $contact = Contact::findOne($id);
        $contact->updateAttributes(['read' => 1]);
        return $this->redirect(['view']);
    }

}
