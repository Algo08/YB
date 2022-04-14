<?php

namespace backend\controllers;

use common\models\Assistance;
use common\models\Citizen;
use common\models\Passport;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CitizenController extends \yii\web\Controller
{
    public function actionVictim()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Citizen::find()->where(['status'=>1]),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tittle' => Yii::t('main','Жертвы')
        ]);
    }
    /**
     * Displays a single Appeal model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => Citizen::findOne($id),
        ]);
    }

    public function actionAssistance($id){
        $model = new Assistance();
        $model->victim_id = $id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return true;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('assistance_form', [
            'model' => $model,
        ]);
    }
    public function actionAssistanceCreate(){
        $model = new Assistance();
        $model->load($this->request->post());

        if ($model->validate()){
            if ($model->save()){
                return $this->renderPartial('history',['appeal_id'=>$model->victim->appeal_id]);
            }
        }
        return 'xato';
    }

    public function actionPerpetrator()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Citizen::find()->where(['status'=>2]),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tittle' => Yii::t('main','Правонарушители')
        ]);
    }

    public function actionCreate(){
        $model = new Citizen();
        $passport = new Passport();
        $model->load($this->request->post());
        $passport->load($this->request->post());

        if ($model->validate() && $passport->save()){
            $model->passport_id = $passport->id;
            if ($model->save()){
                return $this->renderPartial('citizen_table',['appeal_id'=>$model->appeal_id,'status'=>$model->status]);
            }
        }
        return 'xato';
    }

    /**
     * @param $id
     * @return void|Response
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id){
        $model = Citizen::findOne($id)->delete();
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(['index']);
        }
    }

}
