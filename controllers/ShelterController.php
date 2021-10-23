<?php

namespace app\controllers;

use app\models\Animal;
use app\models\AnimalSearch;
use app\models\AnimalType;
use app\models\Shelter;
use yii;
use yii\base\DynamicModel;

class ShelterController extends \yii\web\Controller
{
    /**
     * Pickup an animal from the shelter
     *
     * @return string
     */
    public function actionPickup()
    {
        $animalType = new AnimalType();
        
        $form = new DynamicModel(['animal_type_id']);
        $form->addRule(['animal_type_id'], 'required');
        
        if (Yii::$app->request->post()) {
            if ($form->load(Yii::$app->request->post()) && $form->validate()) {
                $model = Shelter::find()
                    ->select(['s.*'])
                    ->from(Shelter::tableName() . ' s')
                    ->join('LEFT JOIN ', Animal::tableName() . ' a', 'a.id=s.animal_id')
                    ->join('LEFT JOIN ', AnimalType::tableName() . ' at', 'at.id=a.type_id')
                    ->andWhere(['s.status_id' => Shelter::STATUS_ADOPTED])
                    ->orderBy('s.id ASC');
                // OR ->orderBy('s.adopted_date ASC');
                
                if ((int)$form->animal_type_id) {
                    $model->andWhere(['at.id' => $form->animal_type_id]);
                }
                
                $shelter = $model->one();
                $shelter->status_id = Shelter::STATUS_RELEASED;
                $shelter->released_date = date('Y-m-d');
                $shelter->save();
                
                Yii::$app->session->setFlash('success', Yii::t('app', 'You have taken an animal from the shelter.'));
            } else {
                $errors = $form->getFirstErrors();
                Yii::$app->session->setFlash('error', Yii::t('app', 'Error while taking the animal from the shelter: ' . reset($errors)));
            }
        }
        
        return $this->render('pickup', [
            'model' => $form,
            'animalType' => $animalType,
        ]);
    }
    
    /**
     * Put an animal from the shelter
     *
     * @return string
     */
    public function actionPut()
    {
        $animalType = new AnimalType();
        $animal = new Animal();
        
        if ($animal->load(Yii::$app->request->post())) {
            if ($animal->validate() && $animal->save()) {
                
                $shelter = new Shelter();
                $shelter->animal_id = $animal->id;
                $shelter->status_id = Shelter::STATUS_ADOPTED;
                $shelter->adopted_date = date('Y-m-d');
                
                if ($shelter->validate() && $shelter->save()) {
                    Yii::$app->session->setFlash('success', Yii::t('app', 'You have put the animal in the shelter.'));
                    return $this->redirect(['put']);
                } else {
                    $errors = $shelter->getFirstErrors();
                    Yii::$app->session->setFlash('error', Yii::t('app', 'Error while the animal in the shelter: ' . reset($errors)));
                }
            } else {
                $errors = $animal->getFirstErrors();
                Yii::$app->session->setFlash('error', Yii::t('app', 'Error while adoption the animal: ' . reset($errors)));
            }
        }
        
        return $this->render('put', [
            'animalType' => $animalType,
            'animal' => $animal,
        ]);
    }
    
    /**
     * Display animals list of the shelter
     *
     * @return string
     */
    public function actionView()
    {
        $searchModel = new AnimalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
