<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_pelanggan".
 *
 * @property string $kode_pelanggan
 * @property string $nama_pelanggan
 * @property string $no_telp_pelanggan
 * @property string $alamat_pelanggan
 *
 * @property Penjualan[] $penjualans
 */
class MasterPelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pelanggan', 'nama_pelanggan', 'no_telp_pelanggan', 'alamat_pelanggan'], 'required'],
            [['alamat_pelanggan'], 'string'],
            [['kode_pelanggan', 'nama_pelanggan'], 'string', 'max' => 50],
            [['no_telp_pelanggan'], 'string', 'max' => 15],
            [['kode_pelanggan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_pelanggan' => 'Kode Pelanggan',
            'nama_pelanggan' => 'Nama Pelanggan',
            'no_telp_pelanggan' => 'No Telp Pelanggan',
            'alamat_pelanggan' => 'Alamat Pelanggan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['kode_pelanggan' => 'kode_pelanggan']);
    }

    /**
     * {@inheritdoc}
     * @return MasterPelangganQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterPelangganQuery(get_called_class());
    }
}
