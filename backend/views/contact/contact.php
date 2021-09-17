<?php
/**
 * @var \common\models\Contact $contact
 */

use yii\bootstrap4\Html;
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="mailto:<?=$contact->email?>" target="_blank">
                <?=$contact->email?>
            </a>

            <span class="float-right"><?= date('M d, yy H:i',strtotime($contact->date))?></span>
        </h6>
    </div>
    <div class="card-body">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body pr-1">
                <div class="row no-gutters align-items-center">
                    <h3>
                        <?=$contact->full_name?>
                    </h3>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 col-11"><?=$contact->text?></div>
                    <div class="col-1 float-right">
                        <a href="mailto:<?=$contact->email?>" target="_blank" class="btn col-auto px-1">
                            <span class="btn btn-outline-secondary btn-sm btn-circle"><i
                                    class="fas fa-external-link-alt"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($contact->read==0){
            echo Html::a(Yii::t('main', '<i class="far fa-envelope-open"></i> O`qildi sifatida belgilash'), ['readed', 'id' => $contact->id], [
                'class' => 'btn btn-success btn-block my-4',
                'data' => [
                    'confirm' => Yii::t('main', 'Tasqiqlash'),
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </div>
</div>