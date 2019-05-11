<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_supplier".
 *
 * @property string $kode_supplier
 * @property string $nama_supplier
 * @property string $no_telp_supplier
 * @property string $alamat_pelanggan
 *
 * @property Pembelian[] $pembelians
 */
class MasterSupplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_supplier', 'nama_supplier', 'no_telp_supplier', 'alamat_pelanggan'], 'required'],
            [['alamat_pelanggan'], 'string'],
            [['kode_supplier', 'nama_supplier'], 'string', 'max' => 50],
            [['no_telp_supplier'], 'string', 'max' => 15],
            [['kode_supplier'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_supplier' => 'Kode Supplier',
            'nama_supplier' => 'Nama Supplier',
            'no_telp_supplier' => 'No Telp Supplier',
            'alamat_pelanggan' => 'Alamat Pelanggan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['kode_supplier' => 'kode_supplier']);
    }

    /**
     * {@inheritdoc}
     * @return MasterSupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterSupplierQuery(get_called_class());
    }
}
