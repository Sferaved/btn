<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Btn;

/**
 * BtnSearch represents the model behind the search form of `app\models\Btn`.
 */
class BtnSearch extends Btn
{
    /**
     * {@inheritdoc}
     */

	public $date_from;
	public $date_to;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['curency','date_from','date_to', 'time'], 'safe'],
            [['summa', 'exchange'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */

	public function attributeLabels()
    {
        return [
           
            'date_from' => 'Период отбора записей',
		          
        ];
    }

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
        $query = Btn::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    //    $dataProvider->pagination->pageSize=5; // Количество строк в таблице
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

    $query->andFilterWhere(['between', 'time', $this->date_from, $this->date_to]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'time' => $this->time,
            'summa' => $this->summa,
            'exchange' => $this->exchange,
        ]);

        $query->andFilterWhere(['like', 'curency', $this->curency]);

        return $dataProvider;
    }
}
