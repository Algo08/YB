<?php
/**
 *  @var \yii\debug\models\timeline\DataProvider $dataProvider
 */

use yii\widgets\ListView;
?>
<!-- Circle Buttons -->
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-4 topbar h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chats</h6>
            </div>
            <div class="card-body dropdown-list" style="width: 100% !important;">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'contacts',
                    'layout'=> '{items}{pager}'
                ]);?>
            </div>
        </div>
    </div>
    <div class="col-lg-7 chat-full" id="chat">
        <?= $this->renderAjax('contact',['contact'=>$dataProvider->getModels()[0]])?>
    </div>
</div>