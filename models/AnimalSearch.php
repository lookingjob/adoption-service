<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnimalSearch represents the model behind the search form of `app\models\Animal`.
 */
class AnimalSearch extends Animal
{
    public $animal_type_id;
    public $animal_type;
    public $adopted_date;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname'], 'string'],
            [['animal_type'], 'string'],
            [['animal_type_id'], 'integer'],
            [['adopted_date'], 'safe'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find()
            ->select([
                's.id', 's.animal_id', 's.adopted_date', 'a.nickname', 'at.name AS animal_type', 'a.type_id AS animal_type_id'
            ])
            ->from(Shelter::tableName() . ' s')
            ->join('LEFT JOIN ', Animal::tableName() . ' a', 'a.id=s.animal_id')
            ->join('LEFT JOIN ', AnimalType::tableName() . ' at', 'at.id=a.type_id');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'like', 'a.nickname', $this->nickname
        ]);
        $query->andFilterWhere([
            'like', 'at.name', $this->animal_type
        ]);
        $query->andFilterWhere([
            's.adopted_date' => $this->adopted_date
        ]);
        $query->andFilterWhere([
            'a.type_id' => $this->animal_type_id
        ]);
        
        $query->orderBy('a.nickname');
        
        
        return $dataProvider;
    }
}
