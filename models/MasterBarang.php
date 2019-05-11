<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_barang".
 *
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $deskripsi_barang
 * @property double $harga_satuan
 * @property int $stok
 *
 * @property DetailPembelian[] $detailPembelians
 * @property Pembelian[] $kodePembelians
 * @property DetailPenjualan[] $detailPenjualans
 * @property Penjualan[] $kodePenjualans
 */
class MasterBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang', 'deskripsi_barang', 'harga_satuan', 'stok'], 'required'],
            [['deskripsi_barang'], 'string'],
            [['harga_satuan'], 'number'],
            [['stok'], 'integer'],
            [['kode_barang', 'nama_barang'], 'string', 'max' => 50],
            [['kode_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'deskripsi_barang' => 'Deskripsi Barang',
            'harga_satuan' => 'Harga Satuan',
            'stok' => 'Stok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPembelians()
    {
        return $this->hasMany(DetailPembelian::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembelians()
    {
        return $this->hasMany(Pembelian::className(), ['kode_pembelian' => 'kode_pembelian'])->viaTable('detail_pembelian', ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['kode_penjualan' => 'kode_penjualan'])->viaTable('detail_penjualan', ['kode_barang' => 'kode_barang']);
    }

    /**
     * {@inheritdoc}
     * @return MasterBarangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterBarangQuery(get_called_class());
    }
}
