<?php

/* @var $this yii\web\View */
?>
<div class="shelter-put-success">

    <h1><?= Yii::t('app', 'Put Animal Success') ?></h1>
    
    <?php var_dump(Yii::$app->session->hasFlash('success'),Yii::$app->session->flashdata('success'));die; if (Yii::$app->session->hasFlash('success')) { ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">?</button>
            <h4><i class="icon fa fa-check"></i>Animal placed!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php } ?>

</div><!-- shelter-put-success -->
