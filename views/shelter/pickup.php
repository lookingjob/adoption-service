<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Shelter */
/* @var $animalType app\models\AnimalType */
/* @var $form ActiveForm */

?>
<div class="shelter-pickup">
    
    <?php if (Yii::$app->session->hasFlash('success')) { ?>

        <h1><?= Yii::t('app', 'Taking Animal Success') ?></h1>

        <p><?= Yii::t('app', 'Congratulations! This animal is now yours!') ?></p>
        
        <p><?= Html::a(Yii::t('app', 'Pick up another animal from the shelter'), ['pickup'], ['class' => 'btn btn-warning']) ?></p>
    
    <?php } else { ?>

        <h1><?= Yii::t('app', 'Pickup an animal from the shelter') ?></h1>
        
        <p>
            <?= Yii::t('app', 'Please, pick an animal up!') ?>
        </p>
        
        <?php $form = ActiveForm::begin(); ?>
        
        <?php
        $animals = ArrayHelper::map($animalType->find()->select('id, name')->all(), 'id', 'name');
        ?>
        <?= $form->field($model, 'animal_type_id')->dropDownList(array_merge(['0' => 'Any'], $animals))->label(Yii::t('app', 'Animal type')); ?>
        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Pick up!'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    <?php } ?>
    
</div>