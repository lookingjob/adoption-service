<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\AnimalSearch */
?>

<div class="shelter-list">
    
    <h1><?= Yii::t('app', 'Shelter`s animals list') ?></h1>
    
    <p>
    <?= Yii::t('app', 'These are the unfortunate animals that the bad people put in the shelter.') ?>
    </p>
    
    <?= $this->render('_search', ['model' => $searchModel]) ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nickname',
            'animal_type',
            'adopted_date',
        ],
    ]); ?>
    
</div>
