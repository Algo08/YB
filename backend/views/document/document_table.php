<?php
/* @var $this yii\web\View */
/* @var $appeal_id int */
/* @var $status int */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Document;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;


$query = Document::find()->where(['appeal_id'=>$appeal_id]);
$dataProvider = new ActiveDataProvider(['query' => $query]);
?>
<div class="user-index">


<?php Pjax::begin([

    'id' => 'pjax-list-document',

    'enablePushState' => false,

    'enableReplaceState' => false,

])?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'options'=>[
            'class'=> 'table-responsive',
        ],
        'tableOptions' => ['class' => 'table table-lg'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'size',
            ['class' => 'yii\grid\ActionColumn',
                'template'=> $query->all() ? ($query->all()[0]->aPPEAL->status == 0 ? '{delete}' : '{view}') : null,
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<i class="bi bi-download mx-1"></i>',\yii\helpers\Url::to(['/document/download','id'=>$model->id]),
                            ['class' => 'view','data-pjax'=>0]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="bi bi-trash-fill mx-1"></i>', 'javascript:deleteDocument('.$model->id.')', [
                            'class' => 'delete', 'data-key'=>$model->id,
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
<?php Pjax::end()?>
</div>

<?php
$urlDelete = \yii\helpers\Url::to(['/document/delete']);
$script = <<< JS
    function deleteDocument(id){
        $.ajax({
            url: '$urlDelete',
            data: {
                id: id,
            },
            success: function(result) {
               $.pjax.reload({container: '#pjax-list-document'});
            }
        });
    }
JS;
$this->registerJs( $script );
?>