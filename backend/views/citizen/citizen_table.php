<?php
/* @var $this yii\web\View */
/* @var $appeal_id int */
/* @var $status int */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Citizen;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;


$dataProvider = new ActiveDataProvider([
    'query' => Citizen::find()->where(['appeal_id'=>$appeal_id])->andWhere(['status'=>$status]),
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
?>
    <div class="user-index">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}",
            'options'=>[
                'class'=> 'table-responsive',
            ],
            'tableOptions' => ['class' => 'table table-lg'],

            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'firstname',
                'middlename',
                'lastname',
                //'group',
                //'username',
                //'password_hash',
                //'status',
                //'create_at',
                //'update_at',
                //'auth_key',
                // [
                //     'class' => ActionColumn::className(),
                //     'urlCreator' => function ($action, User $model, $key, $index, $column) {
                //         return Url::toRoute([$action, 'id' => $model->id]);
                //      }
                // ],
            ],
        ]); ?>


