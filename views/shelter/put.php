<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $animalType app\models\AnimalType */
/* @var $animal app\models\Animal */
/* @var $shelter app\models\Shelter */
/* @var $form ActiveForm */
?>
<div class="shelter-put">
    
    <?php if (Yii::$app->session->hasFlash('success')) { ?>
        
        <h1><?= Yii::t('app', 'Put Animal Success') ?></h1>
        
        <p><?= Yii::t('app', 'You are bad man :(') ?></p>
        
        <p><?= Html::a(Yii::t('app', 'Put another animal in the shelter'), ['put'], ['class' => 'btn btn-warning']) ?></p>
        
    <?php } else { ?>
    
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">?</button>
            <h4><i class="icon fa fa-check"></i>An error occurred</h4>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
    
    <h1><?= Yii::t('app', 'Put Animal') ?></h1>
    
    <?php $form = ActiveForm::begin(); ?>
    
        <?php
            $animals = ArrayHelper::map($animalType->find()->select('id, name')->all(), 'id', 'name');
        ?>
        <?= $form->field($animal, 'type_id')->dropDownList($animals)->label(Yii::t('app', 'Animal type')); ?>
        <?= $form->field($animal, 'nickname') ?>
        <?= $form->field($animal, 'age') ?>
        <?= $form->field($animal, 'description')->textarea(); ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    
    <?php } ?>

</div>
