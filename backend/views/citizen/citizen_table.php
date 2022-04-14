<?php
/* @var $this yii\web\View */
/* @var $appeal_id int */
/* @var $status int */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Citizen;
use yii\bootstrap5\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

$query = Citizen::find()->where(['appeal_id'=>$appeal_id])->andWhere(['status'=>$status]);
$dataProvider = new ActiveDataProvider(['query' => $query]);
?>
    <div class="user-index">

        <?php Pjax::begin([

            'id' => 'pjax-list',

            'enablePushState' => false,

            'enableReplaceState' => false,

        ]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}",
            'options'=>[
                'class'=> 'table-responsive',
            ],
            'tableOptions' => ['class' => 'table table-lg'],

            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'lastname',
                'firstname',
                'pASSPORT.passport',
                ['class' => 'yii\grid\ActionColumn',
                    'template'=> $query->all() ? ($query->all()[0]->aPPEAL->status == 0 ? '{update} {delete}' : '{view} '.($query->all()[0]->status == 1 ? '{check}':'')) : null,
                    'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                    'buttons'=>[
                        'view'=>function ($url, $model) {
                            return Html::a('<i class="bi bi-eye-fill mx-1"></i>','javascript:0',
                                ['class' => 'view viewBtn', 'data-key'=>$model->id,'data-bs-toggle'=>'modal',
                                    'data-bs-target'=>'#exampleModalCenter']);
                        },
                        'check'=>function ($url, $model) {
                            return Html::a( '<i class="bi bi-shield-check mx-1"></i>','javascript:0',
                                ['class' => 'assistanceBtn', 'data-key'=>$model->id, 'data-bs-toggle'=>'modal',
                                    'data-bs-target'=>'#exampleModalCenter'] );
                        },
                        'update'=>function ($url, $model) {
                            return Html::a( '<i class="bi bi-pencil-fill mx-1"></i>','javascript:0',
                                ['class' => 'update modalBtn', 'data-key'=>$model->id, 'data-bs-toggle'=>'modal',
                                    'data-bs-target'=>'#exampleModalCenter'] );
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="bi bi-trash-fill mx-1"></i>', 'javascript:deleteCitizen('.$model->id.')', [
                                'class' => 'delete',
                                'data' => [
                                    'confirm' => Yii::t('main','Вы уверены, что хотите удалить этот элемент?'),
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>

<?php
$urlDelete = Url::to(['/citizen/delete']);
$script = <<< JS
    function deleteCitizen(id){
        $.ajax({
            url: '$urlDelete',
            data: {
                id: id,
            },
            success: function(result) {
               $.pjax.reload({container: '#pjax-list'});
            }
        });
    }
    
JS;
$this->registerJs( $script );
?>
