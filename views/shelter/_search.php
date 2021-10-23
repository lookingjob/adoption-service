<?php

use app\models\AnimalType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AnimalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nickname') ?>
    
    <?php $animals = ArrayHelper::map((new AnimalType)->find()->select('id, name')->all(), 'id', 'name');?>
    <?= $form->field($model, 'animal_type_id')->dropDownList($animals)->label(Yii::t('app', 'Animal type')); ?>

    <?= $form->field($model, 'adopted_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Find', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>