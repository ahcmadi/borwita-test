<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterSupplier;

/**
 * MasterSupplierSearch represents the model behind the search form of `app\models\MasterSupplier`.
 */
class MasterSupplierSearch extends MasterSupplier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_supplier', 'nama_supplier', 'no_telp_supplier', 'alamat_pelanggan'], 'safe'],
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
        $query = MasterSupplier::find();

        // add conditions that should always apply here

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
        $query->andFilterWhere(['like', 'kode_supplier', $this->kode_supplier])
            ->andFilterWhere(['like', 'nama_supplier', $this->nama_supplier])
            ->andFilterWhere(['like', 'no_telp_supplier', $this->no_telp_supplier])
            ->andFilterWhere(['like', 'alamat_pelanggan', $this->alamat_pelanggan]);

        return $dataProvider;
    }
}
