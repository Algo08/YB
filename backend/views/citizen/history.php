<?php
/* @var $appeal_id int */

use yii\widgets\Pjax;

$appeal = \common\models\Appeal::findOne($appeal_id);
?>
<div class="email-application">
    <div class="content-area-wrapper">
        <div class="content-right">
            <div class="email-app-list-wrapper">
                <div class="email-app-list">
                    <div class="email-user-list list-group ps ps--active-y">
                        <ul class="users-list-wrapper media-list">
                            <?php foreach ($appeal->vICTIMS as $victim):?>
                                <?php foreach ($victim->aSSISTANCE as $assistance):?>

                                    <li class="media mail-read">
                                    <div class="pr-50">
                                        <div class="avatar">
                                            <img src="<?= \yii\helpers\Url::to('@web/') ?>images/faces/1.jpg"
                                                 alt="avtar img holder">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="user-details">
                                            <div class="mail-items">
                                                <span class="list-group-item-text text-truncate"><?=Yii::t('main','Предоставление помощи')?></span>
                                            </div>
                                            <div class="mail-meta-item">
                                                <span class="float-right">
                                                    <span class="mail-date"><?=Yii::$app->formatter->asRelativeTime($assistance->create_at,date('Y-m-d H:i:s'));?></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mail-message">
                                            <p class="list-group-item-text truncate mb-0">
                                                <?= Yii::t('main', 'Тип предоставляемой помощи').': '.Yii::$app->params['assistance_type'][$assistance->type]?>
                                                <br>
                                                <?= Yii::t('main', 'Описание').': '.$assistance->description?>
                                            </p>
                                            <div class="mail-meta-item">
                                                <span class="float-right">
                                                    <span class="bullet bullet-success bullet-sm"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            <?php endforeach;?>

                        </ul>
                        <!-- email user list end -->

                        <!-- no result when nothing to show on list -->
                        <div class="no-results">
                            <i class="bx bx-error-circle font-large-2"></i>
                            <h5><?=Yii::t('main','Ничего не найдено')?></h5>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 733px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 567px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
