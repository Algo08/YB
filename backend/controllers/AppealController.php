<?php

namespace backend\controllers;

use common\models\Appeal;
use common\models\Citizen;
use common\models\District;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
/**
 * AppealController implements the CRUD actions for Appeal model.
 */
class AppealController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index'],
                            'roles' => ['view_application'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['view_application'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['add_application'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create-new'],
                            'roles' => ['add_application'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['delete_application'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['district'],
                            'roles' => ['add_application'],
                        ]
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Appeal models.
     *
     * @return string
     */
    public function actionIndex($status = 1)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Appeal::find()->andWhere(['status'=>$status]),
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Appeal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = Appeal::find()->where(['and',['status'=>0,'creater_id'=>Yii::$app->user->id]])->one() ?? new Appeal();
        
        if ($model->isNewRecord) {
            $model->status = 0;
            $model->creater_id =  Yii::$app->user->id;
            $model->save(false);
        }
        $victim = new Citizen();
        $perpetrator = new Citizen();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->status=1;
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'victim'=>$victim,
            'perpetrator'=>$perpetrator
        ]);
    }

    /**
     * @return void|\yii\web\Response
     */
    public function actionCreateNew(){
        $model = Appeal::find()->where(['and',['status'=>0,'creater_id'=>Yii::$app->user->id]])->one();
        $model->load($this->request->post());
        $model->status=1;
        if ($model->save()) {
            return $this->redirect(['index']);
        }
    }


    public function actionDistrict($region){
        $districts = District::find()->select(['id','name_ru'])->where(['region_id'=>$region])->all();
       return $this->renderPartial('options',['districts'=>$districts]);
    }

    /**
     * Updates an existing Appeal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Appeal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Appeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appeal::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }
}
