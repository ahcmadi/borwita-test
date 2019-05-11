<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pembelian;

/**
 * PembelianSearch represents the model behind the search form of `app\models\Pembelian`.
 */
class PembelianSearch extends Pembelian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pembelian', 'tanggal_pembelian', 'kode_supplier', 'tanggal_dibuat', 'dibuat_oleh'], 'safe'],
            [['total_biaya'], 'number'],
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
        $query = Pembelian::find();

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
        $query->andFilterWhere([
            'tanggal_pembelian' => $this->tanggal_pembelian,
            'total_biaya' => $this->total_biaya,
            'tanggal_dibuat' => $this->tanggal_dibuat,
        ]);

        $query->andFilterWhere(['like', 'kode_pembelian', $this->kode_pembelian])
            ->andFilterWhere(['like', 'kode_supplier', $this->kode_supplier])
            ->andFilterWhere(['like', 'dibuat_oleh', $this->dibuat_oleh]);

        return $dataProvider;
    }
}
