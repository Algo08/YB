<?php
use yii\bootstrap5\Html;
use yii\helpers\Url;
use cinghie\multilanguage\widgets\MultiLanguageWidget;
?>
<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="<?=Url::to('@web/')?>images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="header-top-right">
                <?= MultiLanguageWidget::widget([
                    'addCurrentLang' => true, // add current lang
                    'calling_controller' => $this->context,
                    'image_type'  => 'classic', // classic or rounded
                    'link_home'   => false, // true or false
                    'widget_type' => 'classic', // classic or selector
                    'width'       => '20'
                ]);?>
                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="<?=Url::to('@web/')?>images/faces/1.jpg" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name"><?=Yii::$app->user->identity->username?></h6>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:0">
                                <?= Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>'.Yii::t('main','Выйти из системы'),
                                ['class' => 'btn  logout p-0']
                            )
                            . Html::endForm()
                            ?>
                            </a></li>
                    </ul>
                </div>
                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <?php if (\Yii::$app->user->can('allows_to_manage_administration_staff')):?>
                    <li class="menu-item  has-sub">
                        <a href="#" class='menu-link'>
                            <i class="bi bi-app"></i>
                            <span><?=Yii::t('main','Администрирование')?></span>
                        </a>
                        <div class="submenu ">
                            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                            <div class="submenu-group-wrapper">
                                <ul class="submenu-group">
                                    <li class="submenu-item  ">
                                        <a href="<?= Url::to(['/user'])?>" class='submenu-link'><?=Yii::t('main','Профили')?></a>
                                    </li>
                                    <li class="submenu-item  ">
                                        <a href="<?= Url::to(['/group'])?>" class='submenu-link'><?=Yii::t('main','Группа')?></a>
                                    </li>
                                    <li class="submenu-item  ">
                                        <a href="<?= Url::to(['/organization'])?>" class='submenu-link'><?=Yii::t('main','Организации')?></a>
                                    </li>
                                    <li class="submenu-item  ">
                                        <a href="<?= Url::to(['/auth-assignment'])?>" class='submenu-link'><?=Yii::t('main','Права доступа')?></a>
                                    </li>
                                    <li class="submenu-item  ">
                                        <a href="<?= Url::to(['/district'])?>" class='submenu-link'><?=Yii::t('main','Области')?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php endif;?>
                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-pencil-square"></i>
                        <span><?=Yii::t('main','Обращения')?></span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="<?= Url::to(['/appeal'])?>" class='submenu-link'><?=Yii::t('main','Новые обращения')?></a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="<?= Url::to(['/appeal',['status'=>2]])?>" class='submenu-link'><?=Yii::t('main','Обращения в обработке')?></a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="<?= Url::to(['/appeal',['status'=>3]])?>" class='submenu-link'><?=Yii::t('main','Архив обращений')?></a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="<?= Url::to(['/appeal/create'])?>" class='submenu-link'><?=Yii::t('main','Создать обращение')?></a>
                                </li>
                        </div>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="<?= Url::to(['/citizen/victim'])?>" class='menu-link'>
                        <i class="bi bi-people"></i>
                        <span><?=Yii::t('main','Жертвы')?></span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?= Url::to(['/citizen/perpetrator'])?>" class='menu-link'>
                        <i class="bi bi-people"></i>
                        <span><?=Yii::t('main','Правонарушители')?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>