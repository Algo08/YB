<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= Yii::$app->homeUrl?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="<?= \yii\helpers\Url::to('@web/user.png')?>" style="width: 45px" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">Visit <sup>sayt</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=\yii\helpers\Url::to('@web')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bosh sahifa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        News
    </div>

    
    <li class="nav-item">
        <a class="nav-link" href="<?=\yii\helpers\Url::to('@web/slider')?>">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Slider</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=\yii\helpers\Url::to('@web/about')?>">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>About</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?=\yii\helpers\Url::to('@web/address')?>">
            <i class="fas fa-map-marker"></i>
            <span>Address</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
