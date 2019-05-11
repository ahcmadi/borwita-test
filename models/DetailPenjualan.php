<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_penjualan".
 *
 * @property string $kode_penjualan
 * @property string $kode_barang
 * @property double $harga_satuan
 * @property int $jumlah
 *
 * @property MasterBarang $kodeBarang
 * @property Penjualan $kodePenjualan
 */
class DetailPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_penjualan', 'kode_barang', 'harga_satuan', 'jumlah'], 'required'],
            [['harga_satuan'], 'number'],
            [['jumlah'], 'integer'],
            [['kode_penjualan', 'kode_barang'], 'string', 'max' => 50],
            [['kode_penjualan', 'kode_barang'], 'unique', 'targetAttribute' => ['kode_penjualan', 'kode_barang']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => MasterBarang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
            [['kode_penjualan'], 'exist', 'skipOnError' => true, 'targetClass' => Penjualan::className(), 'targetAttribute' => ['kode_penjualan' => 'kode_penjualan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_penjualan' => 'Kode Penjualan',
            'kode_barang' => 'Kode Barang',
            'harga_satuan' => 'Harga Satuan',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(MasterBarang::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePenjualan()
    {
        return $this->hasOne(Penjualan::className(), ['kode_penjualan' => 'kode_penjualan']);
    }

    /**
     * {@inheritdoc}
     * @return DetailPenjualanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailPenjualanQuery(get_called_class());
    }
}
