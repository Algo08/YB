<?php
/**
 * @var \common\models\Contact[] $models
 * @var int $countMess
 */

use yii\bootstrap4\Html;
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?=$countMess?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <?php foreach ($models as $model):?>
                <a class="dropdown-item d-flex align-items-center chat-id" data-key="<?= $model->id?>"
                    href="javascript:0">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?= \yii\helpers\Url::to('@web/user.png')?>" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate"><?=$model->text?></div>
                        <div class="small text-gray-500">
                            <?=Yii::$app->formatter->asRelativeTime($model->date,date('Y-m-d H:i:s'));?></div>
                    </div>
                </a>
                <?php endforeach;?>
                <a class="dropdown-item text-center small text-gray-500"
                    href="<?=\yii\helpers\Url::to('@web/contact/view')?>">Hammasini kurish</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?=Yii::$app->user->identity->username?></span>
                <img class="img-profile rounded-circle" src="<?=\yii\helpers\Url::to('@web/theme/img/profile.jpg')?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:0">
                    <?= Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout',
                                ['class' => 'btn  logout p-0']
                            )
                            . Html::endForm()
                            ?>
                </a>
            </div>
        </li>

    </ul>

</nav>