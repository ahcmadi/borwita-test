<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_pembelian".
 *
 * @property string $kode_pembelian
 * @property string $kode_barang
 * @property double $harga_satuan
 * @property int $jumlah
 *
 * @property MasterBarang $kodeBarang
 * @property Pembelian $kodePembelian
 */
class DetailPembelian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pembelian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pembelian', 'kode_barang', 'harga_satuan', 'jumlah'], 'required'],
            [['harga_satuan'], 'number'],
            [['jumlah'], 'integer'],
            [['kode_pembelian', 'kode_barang'], 'string', 'max' => 50],
            [['kode_pembelian', 'kode_barang'], 'unique', 'targetAttribute' => ['kode_pembelian', 'kode_barang']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => MasterBarang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
            [['kode_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['kode_pembelian' => 'kode_pembelian']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_pembelian' => 'Kode Pembelian',
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
    public function getKodePembelian()
    {
        return $this->hasOne(Pembelian::className(), ['kode_pembelian' => 'kode_pembelian']);
    }

    /**
     * {@inheritdoc}
     * @return DetailPembelianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailPembelianQuery(get_called_class());
    }
}
