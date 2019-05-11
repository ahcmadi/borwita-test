<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailPembelian;

/**
 * DetailPembelianSearch represents the model behind the search form of `app\models\DetailPembelian`.
 */
class DetailPembelianSearch extends DetailPembelian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pembelian', 'kode_barang'], 'safe'],
            [['harga_satuan'], 'number'],
            [['jumlah'], 'integer'],
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
        $query = DetailPembelian::find();

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
            'harga_satuan' => $this->harga_satuan,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'kode_pembelian', $this->kode_pembelian])
            ->andFilterWhere(['like', 'kode_barang', $this->kode_barang]);

        return $dataProvider;
    }
}
