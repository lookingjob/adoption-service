<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shelter".
 *
 * @property int $id
 * @property int $animal_id
 * @property int $status_id
 * @property string $adopted_date
 * @property string $released_date
 *
 * @property Animal $animal
 */
class Shelter extends \yii\db\ActiveRecord
{
    CONST STATUS_ADOPTED = 1;
    CONST STATUS_RELEASED = 2;
    CONST STATUS_DIED = 3;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shelter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['animal_id', 'status_id', 'adopted_date'], 'required'],
            [['animal_id', 'status_id'], 'integer'],
            [['adopted_date', 'released_date'], 'safe'],
            ['status_id', 'in', 'range' => [self::STATUS_ADOPTED, self::STATUS_RELEASED, self::STATUS_DIED], 'allowArray' => false],
            [['animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['animal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'animal_id' => Yii::t('app', 'Animal ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'adopted_date' => Yii::t('app', 'Adopted Date'),
            'released_date' => Yii::t('app', 'Released Date'),
        ];
    }

    /**
     * Gets query for [[Animal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimal()
    {
        return $this->hasOne(Animal::class, ['id' => 'animal_id']);
    }
}
