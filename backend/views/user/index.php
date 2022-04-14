<?php

use common\models\Group;
use common\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Пользователь');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <button data-key="" type="button" class="btn btn-primary me-1 mb-1 modalBtn" data-bs-toggle="modal"
            data-bs-target="#exampleModalCenter">
            <?=Yii::t('main', 'Создать пользователь')?>
        </button>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
            [
                'attribute'=>'organization',
                'filter'=>ArrayHelper::map(Organization::find()->asArray()->all(), 'id', 'name'),
                'value' => function ($data) {
                    return $data->oRGANIZATION;
                },
                
            ],
            [
                'attribute'=>'group',
                'filter'=>ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name'),
                'value' => function ($data) {
                    return $data->gROUP;
                },
            ],
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

    <?php Pjax::end(); ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <img src="<?=Url::to('@web/')?>images/svg-loaders/ball-triangle.svg" class="mx-auto my-5" style="width: 3rem" alt="audio">
            </div>
        </div>
    </div>
</div>
<?php
$url = Url::to(['create']);
$script = <<< JS
    
    var modal = $('.modal-content');
   
        var create = $('.modalBtn');
        create.click(function (){
            var id = $(this).data('key');
            $.ajax({
                url: '$url',
                data: {
                    id: id
                },
                success: function(result) {
                modal.html(result);
                }
            });     
        });
JS;
$this->registerJs( $script );
?>