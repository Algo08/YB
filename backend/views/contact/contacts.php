<?php
/**
 * @var \common\models\Contact $model
 **/
?>

<a href="#chat" class="dropdown-item d-flex align-items-center chat-id" data-key="<?= $model->id?>" href="javascript:0">
    <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="<?= \yii\helpers\Url::to('@web/user.png')?>" alt="">
        <div class="status-indicator bg-success"></div>
    </div>
    <div class="font-weight-bold">
        <div class="text-truncate"><?=$model->text?></div>
        <div class="small text-gray-500">
            <?=Yii::$app->formatter->asRelativeTime($model->date,date('Y-m-d H:i:s'));?>
        </div>
    </div>
    <div class="col">
        <i class="fas fa-envelope<?=$model->read ? '-open' : ''?> text-gray-300 float-right"></i>
    </div>
</a>

<?php
$urlChat = \yii\helpers\Url::to('contact');
$script = <<< JS
    
    
    $(document).ready(function () {
        var chatFull = $('.chat-full');
        var chat = $('.chat-id');
        chat.click(function (){
            var id = $(this).data('key');
            $.ajax({
                url: '$urlChat',
                data: {
                    id: id,
                },
                success: function(result) {
                    chatFull.html(result);
                }
            });
                
        });
    });
JS;
$this->registerJs( $script );
?>