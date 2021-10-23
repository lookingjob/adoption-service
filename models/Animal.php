<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property int $animal_type_id
 * @property string $nickname
 * @property int $age
 * @property string|null $description
 *
 * @property Type $type
 * @property Shelter[] $shelters
 */
class Animal extends \yii\db\ActiveRecord
{
    /* OR
    CONST TYPE_CAT = 1;
    CONST TYPE_DOG = 2;
    CONST TYPE_TURTLE = 3;
    */
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'nickname', 'age'], 'required'],
            [['type_id', 'age'], 'integer'],
            [['description'], 'string'],
            [['nickname'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnimalType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'nickname' => Yii::t('app', 'Nickname'),
            'age' => Yii::t('app', 'Age'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[AnimalType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AnimalType::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Shelters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShelters()
    {
        return $this->hasMany(Shelter::class, ['animal_id' => 'id']);
    }
}
